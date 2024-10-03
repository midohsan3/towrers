<?php

namespace App\Http\Controllers\Admin;

use App\Models\ProductMdl;
use Illuminate\Http\Request;
use App\Models\ProductPhotoMdl;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ProductPhotoController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    /**
     * ============================
     * ============================
     */
    public function index(ProductMdl $product)
    {
        $product::find($product);

        $photos = ProductPhotoMdl::where('product_id', $product->id)->get();

        $photosCount = ProductPhotoMdl::where('product_id', $product->id)->count();

        return view('product.glary', compact('product', 'photos', 'photosCount'));
    }
    /**
     * ============================
     * ============================
     */
    public function store(Request $req)
    {
        $valid = Validator::make($req->all(), [
            'product' => 'required|integer|exists:products,id',
            'photo'      =>  'required|image|mimes:jpeg,png,jpg,gif',
        ], [
            'product.required' => __('general.Cant complete Your Request Now'),
            'product.integer'  => __('general.Cant complete Your Request Now'),
            'product.exists'    => __('general.Cant complete Your Request Now'),

            'photo.required'     => __('general.Field Is Required'),
            'photo.image'        => __('general.The file you uploaded is Not Image'),
            'photo.mimes'       => __('general.Image formate is not allowed'),
        ]);

        if ($valid->fails()) {
            return back()->withErrors($valid);
        }

        $oldPhotos = ProductPhotoMdl::where('product_id', $req->product)->get();

        if ($oldPhotos->count() > 4) {
            Alert()->error(__('product.You Reach Photos Limit'));
            return back();
        }

        if ($req->hasFile('photo')) {
            $img = $req->file('photo');
            $imgName = rand() . '.' . $img->getClientOriginalExtension();
            //save file like a temp
            $img->move(('imgs/products'), $imgName);
            //RESIZING THE PICTURE AND MAKE A COPY WITH NEW SIZE IN STOREAGE FILE
            $resize = Image::make("imgs/products/{$imgName}")->resize(450, 675)->encode('png');
            Storage::put("public/imgs/products/{$imgName}", $resize->__toString());
            //delete the file as a temp
            File::delete('imgs/products/' . $imgName);
        } else {
            $imgName = null;
        }

        foreach ($oldPhotos as $phot) {
            $phot->status = 0;
            $phot->save();
        }

        ProductPhotoMdl::create([
            'product_id' => $req->product,
            'photo'       => $imgName,
        ]);


        $product = ProductMdl::findOrFail($req->product);
        $product->main_pic = $imgName;
        $product->save();

        Alert()->success(__('general.Record Added Successfully'));
        return back();
    }
    /**
     * ============================
     * ============================
     */
    public function activate($photo)
    {
        $photo = ProductPhotoMdl::find($photo);

        $photos = ProductPhotoMdl::where('product_id', $photo->product_id)->get();

        foreach ($photos as $oldPhoto) {
            $oldPhoto->status = 0;
            $oldPhoto->save();
        }

        $photo->status = 1;
        $photo->save();

        $product = ProductMdl::find($photo->product_id);

        $product->main_pic = $photo->photo;
        $product->save();

        Alert()->success(__('general.Record Updated Successfully'));
        return back();
    }
    /**
     * ============================
     * ============================
     */
    public function destroy($photo)
    {
        $photo = ProductPhotoMdl::find($photo);

        $product = ProductMdl::find($photo->product_id);

        if ($product->main_pic == $photo->photo) {

            $product->main_pic = null;
            $product->save();
        }

        $photo->forceDelete();

        if ($product->main_pic == null) {

            $lastPhoto = ProductPhotoMdl::where('product_id', $product->id)->orderBy('id', 'DESC')->first();

            $lastPhoto->status = 1;
            $lastPhoto->save();

            $product->main_pic = $lastPhoto->photo;
            $product->save();
        }

        Alert()->success(__('general.Record Deleted Successfully'));

        return back();
    }
    /**
     * ============================
     * ============================
     */
}

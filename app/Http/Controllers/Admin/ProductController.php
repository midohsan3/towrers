<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\UnitMdl;
use App\Models\ProductMdl;
use App\Models\InterestMdl;
use Illuminate\Http\Request;
use App\Models\ProductPhotoMdl;
use App\Models\UserInterestMdl;
use App\Models\ProductCategoryMdl;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;
use App\Notifications\NewProduct;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('permission:product-list', ['only' => ['index']]);
        $this->middleware('permission:product-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:product-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:product-featured|product-normalize', ['only' => ['featured', 'normalize']]);
        $this->middleware('permission:product-delete', ['only' => ['destroy']]);
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
    public function index()
    {
        $products = ProductMdl::orderBy('id', 'DESC')->paginate(pageCount);

        $productsCount = ProductMdl::count();

        $photos = ProductPhotoMdl::select('id', 'product_id')->get()->countBy('product_id')->all();

        return view('product.index', compact('products', 'productsCount', 'photos'));
    }
    /**
     * ============================
     * ============================
     */
    public function create()
    {
        if (App::getLocale() == 'ar') {
            $categories = ProductCategoryMdl::where('status', 1)->orderBy('name_ar', 'ASC')->get();

            $units = UnitMdl::where('status', 1)->orderBy('name_ar', 'ASC')->get();
        } else {
            $categories = ProductCategoryMdl::where('status', 1)->orderBy('name_ar', 'ASC')->get();

            $units = UnitMdl::where('status', 1)->orderBy('name_en', 'ASC')->get();
        }

        return view('product.create', compact('categories', 'units'));
    }
    /**
     * ============================
     * ============================
     */
    public function store(Request $req)
    {
        $valid = Validator::make($req->all(), [
            'name_ar' => 'required|string',
            'name_en' => 'required|string',
            'category' => 'required|integer|exists:products_categories,id',
            'quantity' => 'required|numeric',
            'unit'      => 'required|integer|exists:units,id',
            'price'     => 'required|numeric',
        ], [
            'name_ar.required' => __('general.Field Is Required'),
            'name_ar.string' => __('general.Format Not Matching'),

            'name_en.required' => __('general.Field Is Required'),
            'name_en.string' => __('general.Format Not Matching'),

            'category.required' => __('general.Field Is Required'),
            'category.integer'  => __('general.Format Not Matching'),
            'category.exists'    => __('general.This Filed Dosnt Exist'),

            'quantity.required' => __('general.Field Is Required'),
            'quantity.numeric' => __('general.Field Is Required'),

            'unit.required' => __('general.Field Is Required'),
            'unit.integer'  => __('general.Format Not Matching'),
            'unit.exists'    => __('general.This Filed Dosnt Exist'),

            'price.required' => __('general.Field Is Required'),
            'price.numeric' => __('general.Field Is Required'),
        ]);

        if ($valid->fails()) {
            return back()->withErrors($valid)->withInput($req->all());
        }

        ProductMdl::create([
            'product_category_id' => $req->category,
            'unit_id'                 => $req->unit,
            'name_en'               => $req->name_en,
            'name_ar'               => $req->name_ar,
            'quantity'               => $req->quantity,
            'price'                   => $req->price,
            'description_en'       => $req->description_en,
            'description_ar'       => $req->description_ar,
        ]);

        Alert()->success(__('general.Record Added Successfully'));
        return redirect()->route('product.index');
    }
    /**
     * ============================
     * ============================
     */
    public function notify($product){
        $product = ProductMdl::find($product);

        $interest = InterestMdl::where([['name_en','Products'],['status',1]])->first();

        if($interest){
            $usersInterest =
            UserInterestMdl::select('user_id')->where('interest_id',$interest->id)->get()->pluck('user_id')->toArray();

            $users = User::whereIn('id',$usersInterest)->get();

            Notification::send($users,new NewProduct($product->id,$product->name_en,$product->name_ar));

            Alert()->success(__('general.Record Updated Successfully'));
            return back();
        }else{
            Alert()->error(__('general.Cant complete Your Request Now'));
            return back();
        }
    }
     /**
     * ============================
     * ============================
     */
    public function edit(ProductMdl $product)
    {
        $product::find($product);

        if (App::getLocale() == 'ar') {
            $categories = ProductCategoryMdl::where('status', 1)->orderBy('name_ar', 'ASC')->get();

            $units = UnitMdl::where('status', 1)->orderBy('name_ar', 'ASC')->get();
        } else {
            $categories = ProductCategoryMdl::where('status', 1)->orderBy('name_en', 'ASC')->get();

            $units = UnitMdl::where('status', 1)->orderBy('name_en', 'ASC')->get();
        }


        return view('product.edit', compact('product', 'categories', 'units'));
    }
    /**
     * ============================
     * ============================
     */
    public function update(Request $req)
    {
        $valid = Validator::make($req->all(), [
            'product' => 'required|integer|exists:products,id',
            'name_ar' => 'required|string',
            'name_en' => 'required|string',
            'category' => 'required|integer|exists:products_categories,id',
            'quantity' => 'required|numeric',
            'unit'      => 'required|integer|exists:units,id',
            'price'     => 'required|numeric',
        ], [
            'product.required' => __('general.Cant complete Your Request Now'),
            'product.integer'  => __('general.Cant complete Your Request Now'),
            'product.exists'    => __('general.Cant complete Your Request Now'),

            'name_ar.required' => __('general.Field Is Required'),
            'name_ar.string' => __('general.Format Not Matching'),

            'name_en.required' => __('general.Field Is Required'),
            'name_en.string' => __('general.Format Not Matching'),

            'category.required' => __('general.Field Is Required'),
            'category.integer'  => __('general.Format Not Matching'),
            'category.exists'    => __('general.This Filed Dosnt Exist'),

            'quantity.required' => __('general.Field Is Required'),
            'quantity.numeric' => __('general.Field Is Required'),

            'unit.required' => __('general.Field Is Required'),
            'unit.integer'  => __('general.Format Not Matching'),
            'unit.exists'    => __('general.This Filed Dosnt Exist'),

            'price.required' => __('general.Field Is Required'),
            'price.numeric' => __('general.Field Is Required'),
        ]);

        if ($valid->fails()) {
            return back()->withErrors($valid)->withInput($req->all());
        }

        $product = ProductMdl::findOrFail($req->product);

        $product->product_category_id = $req->category;
        $product->unit_id                  = $req->unit;
        $product->name_en               = $req->name_en;
        $product->name_ar               = $req->name_ar;
        $product->quantity              = $req->quantity;
        $product->price                 = $req->price;
        $product->description_en        = $req->description_en;
        $product->description_ar        = $req->description_ar;
        $product->save();

        Alert()->success(__('general.Record Updated Successfully'));
        return back();
    }
    /**
     * ============================
     * ============================
     */
    public function featured(ProductMdl $product)
    {
        $product::find($product);
        $product->featured = 1;
        $product->save();

        Alert()->success(__('general.Record Updated Successfully'));
        return back();
    }
    /**
     * ============================
     * ============================
     */
    public function normalize(ProductMdl $product)
    {
        $product::find($product);
        $product->featured = 0;
        $product->save();

        Alert()->success(__('general.Record Updated Successfully'));
        return back();
    }
    /**
     * ============================
     * ============================
     */
    public function destroy(Request $req)
    {
        $valid = Validator::make($req->all(), [
            'productID' => 'required|integer|exists:products,id',
        ]);

        if ($valid->fails()) {
            Alert()->error(__('general.Cant complete Your Request Now'));
            return back();
        }

        $product = ProductMdl::findOrFail($req->productID);

        $product->forceDelete();

        Alert()->success(__('general.Record Deleted Successfully'));
        return back();
    }
    /**
     * ============================
     * ============================
     */
}

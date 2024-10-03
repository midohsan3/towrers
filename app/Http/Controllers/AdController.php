<?php

namespace App\Http\Controllers;

use App\Models\SizeMdl;
use Illuminate\Http\Request;
use App\Models\ClassifiedMdl;
use Illuminate\Support\Carbon;
use App\Models\ClassifiedPackageMdl;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class AdController extends Controller
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
    public function create($package)
    {
        $package = ClassifiedPackageMdl::find($package);

        return view('front.uploadAd', compact('package'));
    }
    /**
     * ============================
     * ============================
     */
    public function store(Request $req)
    {
        $valid = Validator::make($req->all(), [
            'package' => 'required|integer|exists:classifieds_packages,id',
            'photo'    =>  'required|image|mimes:jpeg,png,jpg,gif',
            'link'      =>  'nullable|url',
            'period'   =>  'required|numeric',
        ], [
            'package.required' => __('general.Cant complete Your Request Now'),
            'package.integer'  => __('general.Cant complete Your Request Now'),
            'package.exists'    => __('general.Cant complete Your Request Now'),

            'photo.required'     => __('general.Field Is Required'),
            'photo.image'        => __('general.The file you uploaded is Not Image'),
            'photo.mimes'       => __('general.Image formate is not allowed'),

            'period.required' => __('general.Cant complete Your Request Now'),
            'period.numeric' => __('general.Format Not Matching'),


        ]);

        if ($valid->fails()) {
            return back()->withErrors($valid)->withInput($req->all());
        }

        $package = ClassifiedPackageMdl::findOrFail($req->package);

        $size = SizeMdl::find($package->size_id);

        if ($req->hasFile('photo')) {
            $img = $req->file('photo');
            $imgName = rand() . '.' . $img->getClientOriginalExtension();
            //save file like a temp
            $img->move(('imgs/ads'), $imgName);
            //RESIZING THE PICTURE AND MAKE A COPY WITH NEW SIZE IN STOREAGE FILE
            $resize = Image::make("imgs/ads/{$imgName}")->resize($size->width, $size->height)->encode('png');
            Storage::put("public/imgs/ads/{$imgName}", $resize->__toString());
            //delete the file as a temp
            File::delete('imgs/ads/' . $imgName);
        } else {
            $imgName = null;
        }

        $amount = number_format($package->price * $req->period, 2);

        $classified = ClassifiedMdl::create([
            'user_id'                  => Auth::user()->id,
            'classified_package_id' => $package->id,
            'size_id'                   => $size->id,
            'name'                    => Auth::user()->name,
            'phone'                    => Auth::user()->phone,
            'title_en'                    => 'a',
            'title_ar'                    => 'a',
            'photo'                    => $imgName,
            'paid_amount'           => $amount,
            'started_at'              => Carbon::now(),
            'ended_at'                => Carbon::now()->addDays($req->period),
            'link'                      => $req->link,
        ]);
        return redirect()->route('ad.pay', $classified->id);
    }
    /**
     * ============================
     * ============================
     */
    public function pay($classified)
    {
        $classified = ClassifiedMdl::find($classified);
        return view('front.payAd', compact('classified'));
    }
    /**
     * ============================
     * ============================
     */
    public function finishPayment($classified)
    {
        $classified = ClassifiedMdl::find($classified);

        $classified->payment_status = 1;
        $classified->save();

        Alert()->success(__('general.Record Added Successfully'));

        return redirect()->route('home');
    }
    /**
     * ============================
     * ============================
     */
}

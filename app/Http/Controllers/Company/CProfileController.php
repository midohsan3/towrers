<?php

namespace App\Http\Controllers\Company;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;
use App\Models\CityMdl;
use App\Models\CommunicationMdl;
use App\Models\CompanyMdl;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class CProfileController extends Controller
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
    public function index()
    {
    }
    /**
     * ============================
     * ============================
     */
    public function createLogo()
    {
        return view('companyProfile.uploadLogo');
    }
    /**
     * ============================
     * ============================
     */
    public function storeLogo(Request $req)
    {
        $valid = Validator::make($req->all(), [
            'logo'           => 'required|image|mimes:jpeg,png,jpg,gif',
        ], [

            'logo.required'     => __('general.Field Is Required'),
            'logo.image'        => __('general.The file you uploaded is Not Image'),
            'logo.mimes'        => __('general.Image formate is not allowed'),
        ]);

        if ($valid->fails()) {
            return back()->withErrors($valid)->withInput($req->all());
        }

        if ($req->hasFile('logo')) {
            $img = $req->file('logo');
            $imgName = rand() . '.' . $img->getClientOriginalExtension();
            //save file like a temp
            $img->move(('imgs/users'), $imgName);
            //RESIZING THE PICTURE AND MAKE A COPY WITH NEW SIZE IN STOREAGE FILE
            $resize = Image::make("imgs/users/{$imgName}")->resize(250, 250)->encode('png');
            Storage::put("public/imgs/users/{$imgName}", $resize->__toString());
            //delete the file as a temp
            File::delete('imgs/users/' . $imgName);
        } else {
            $imgName = null;
        }

        $user = User::find(Auth::user()->id);

        $user->profile_pic = $imgName;
        $user->save();


        Alert()->success(__('company.Logo Uploaded Successfully'));
        return redirect()->route('home');
    }
    /**
     * ============================
     * ============================
     */
    public function createAddress(Request $req)
    {
        if (App::getLocale() == 'ar') {
            $cities = CityMdl::where('status', 1)->orderBy('name_ar', 'ASC')->get();
        } else {
            $cities = CityMdl::where('status', 1)->orderBy('name_en', 'ASC')->get();
        }

        return view('companyProfile.chooseCity', compact('cities'));
    }
    /**
     * ============================
     * ============================
     */
    public function storeAddress(Request $req)
    {
        $valid = Validator::make($req->all(), [
            'city_id'           => 'required|integer|exists:cities,id',
        ], [


            'city_id.required' => __('general.Field Is Required'),
            'city_id.integer'   => __('general.Format Not Matching'),
            'city_id.exists'     => __('general.This Filed Dosnt Exist'),
        ]);

        if ($valid->fails()) {
            return back()->withErrors($valid)->withInput($req->all());
        }

        $company = CompanyMdl::where('user_id', Auth::user()->id)->first();

        $company->city_id = $req->city_id;
        $company->address = $req->address;
        $company->lat       = $req->lat;
        $company->lng       = $req->lng;
        $company->save();

        Alert()->success(__('general.Record Added Successfully'));
        return redirect()->route('home');
    }
    /**
     * ============================
     * ============================
     */
}

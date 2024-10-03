<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\CompanyMdl;
use Illuminate\Http\Request;
use App\Models\CompanySliderMdl;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class CompanySliderController extends Controller
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
        $sliders = CompanySliderMdl::orderBy('id', 'DESC')->paginate(pageCount);

        $slidersCount = CompanySliderMdl::count();

        if (App::getLocale() == 'ar') {
            $companies = CompanyMdl::orderBy('name_ar', 'ASC')->get();
        } else {
            $companies = CompanyMdl::orderBy('name_en', 'ASC')->get();
        }

        return view('sliders.companySlider.index', compact('sliders', 'slidersCount', 'companies'));
    }
    /**
     * ============================
     * ============================
     */
    public function byCompany($user)
    {
        $user = User::find($user);

        $sliders = CompanySliderMdl::where('user_id', $user->id)->orderBy('id', 'DESC')->paginate(pageCount);

        $slidersCount = CompanySliderMdl::where('user_id', $user->id)->count();

        return view('companies.slider', compact('user', 'sliders', 'slidersCount'));
    }
    /**
     * ============================
     * ============================
     */
    public function store(Request $req)
    {
        $valid = Validator::make($req->all(), [
            'company_id' => 'nullable|integer|exists:users,id',
            'photo'         =>  'required|image|mimes:jpeg,png,jpg,gif',
        ]);

        if ($valid->fails()) {
            Alert()->error(__('general.Cant complete Your Request Now'));
            return back();
        }

        if ($req->hasFile('photo')) {
            $img = $req->file('photo');
            $imgName = rand() . '.' . $img->getClientOriginalExtension();
            //save file like a temp
            $img->move(('imgs/sliders'), $imgName);
            //RESIZING THE PICTURE AND MAKE A COPY WITH NEW SIZE IN STOREAGE FILE
            $resize = Image::make("imgs/sliders/{$imgName}")->resize(1116, 391)->encode('png');
            Storage::put("public/imgs/sliders/{$imgName}", $resize->__toString());
            //delete the file as a temp
            File::delete('imgs/sliders/' . $imgName);
        } else {
            $imgName = null;
        }

        CompanySliderMdl::create([
            'user_id' => $req->company_id,
            'photo' => $imgName,
        ]);

        Alert()->success(__('general.Record Added Successfully'));
        return back();
    }
    /**
     * ============================
     * ============================
     */
    public function edit(CompanySliderMdl $slider)
    {
        $slider::find($slider);

        return view('sliders.companySlider.glary', compact('slider'));
    }
    /**
     * ============================
     * ============================
     */
    public function update(Request $req)
    {
        $valid = Validator::make($req->all(), [
            'slider'  => 'required|integer|exists:company_sliders,id',
            'photo' =>  'required|image|mimes:jpeg,png,jpg,gif',
        ]);

        if ($valid->fails()) {
            Alert()->error(__('general.Cant complete Your Request Now'));
            return back();
        }

        if ($req->hasFile('photo')) {
            $img = $req->file('photo');
            $imgName = rand() . '.' . $img->getClientOriginalExtension();
            //save file like a temp
            $img->move(('imgs/sliders'), $imgName);
            //RESIZING THE PICTURE AND MAKE A COPY WITH NEW SIZE IN STOREAGE FILE
            $resize = Image::make("imgs/sliders/{$imgName}")->resize(1116, 391)->encode('png');
            Storage::put("public/imgs/sliders/{$imgName}", $resize->__toString());
            //delete the file as a temp
            File::delete('imgs/sliders/' . $imgName);
            File::delete('storage/app/public/imgs/sliders/' . $req->old_photo);
        } else {
            $imgName = $req->old_photo;
        }

        $slider = CompanySliderMdl::findOrFail($req->slider);

        $slider->photo = $imgName;
        $slider->save();

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
            'sliderID'  => 'required|integer|exists:company_sliders,id',
        ]);

        if ($valid->fails()) {
            Alert()->error(__('general.Cant complete Your Request Now'));
            return back();
        }

        $slider = CompanySliderMdl::findOrFail($req->sliderID);

        File::delete('storage/app/public/imgs/sliders/' . $slider->photo);

        $slider->delete();


        Alert()->success(__('general.Record Deleted Successfully'));
        return back();
    }
    /**
     * ============================
     * ============================
     */
}

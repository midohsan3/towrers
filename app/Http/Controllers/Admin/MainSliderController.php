<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\MainSliderMdl;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class MainSliderController extends Controller
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
        $sliders = MainSliderMdl::orderBy('id', 'DESC')->paginate(pageCount);

        $slidersCount = MainSliderMdl::count();

        return view('sliders.mainSlider.index', compact('sliders', 'slidersCount'));
    }
    /**
     * ============================
     * ============================
     */
    public function store(Request $req)
    {
        $valid = Validator::make($req->all(), [
            'small_title_ar' => 'nullable|string',
            'small_title_en' => 'nullable|string',
            'title_ar'         => 'required|string',
            'title_en'         => 'required|string',
            'photo'           =>  'required|image|mimes:jpeg,png,jpg,gif',
        ]);

        if ($valid->fails()) {
            Alert()->error($valid);
            return back();
        }

        if ($req->hasFile('photo')) {
            $img = $req->file('photo');
            $imgName = rand() . '.' . $img->getClientOriginalExtension();
            //save file like a temp
            $img->move(('imgs/sliders'), $imgName);
            //RESIZING THE PICTURE AND MAKE A COPY WITH NEW SIZE IN STOREAGE FILE
            $resize = Image::make("imgs/sliders/{$imgName}")->resize(1350, 600)->encode('png');
            Storage::put("public/imgs/sliders/{$imgName}", $resize->__toString());
            //delete the file as a temp
            File::delete('imgs/sliders/' . $imgName);
        } else {
            $imgName = null;
        }

        MainSliderMdl::create([
            'small_head_en' => $req->small_title_en,
            'small_head_ar' => $req->small_title_ar,
            'head_en'         => $req->title_en,
            'head_ar'         => $req->title_ar,
            'photo'            => $imgName,
            'link'               => $req->link,
        ]);

        Alert()->success(__('general.Record Added Successfully'));
        return redirect()->route('slider.main.index');
    }
    /**
     * ============================
     * ============================
     */
    public function edit($slider)
    {
        $slider = MainSliderMdl::find($slider);
        return view('sliders.mainSlider.glary', compact('slider'));
    }
    /**
     * ============================
     * ============================
     */
    public function update(Request $req)
    {
        $valid = Validator::make($req->all(), [
            'slider_id'       => 'required|integer|exists:main_sliders,id',
            'small_title_ar' => 'nullable|string',
            'small_title_en' => 'nullable|string',
            'title_ar'         => 'required|string',
            'title_en'         => 'required|string',
            'photo'           =>  'nullable|image|mimes:jpeg,png,jpg,gif',
        ]);

        if ($valid->fails()) {
            return back()->withErrors($valid)->withInput($req->all());
        }

        if ($req->hasFile('photo')) {
            $img = $req->file('photo');
            $imgName = rand() . '.' . $img->getClientOriginalExtension();
            //save file like a temp
            $img->move(('imgs/sliders'), $imgName);
            //RESIZING THE PICTURE AND MAKE A COPY WITH NEW SIZE IN STOREAGE FILE
            $resize = Image::make("imgs/sliders/{$imgName}")->resize(1350, 600)->encode('png');
            Storage::put("public/imgs/sliders/{$imgName}", $resize->__toString());
            //delete the file as a temp
            File::delete('imgs/sliders/' . $imgName);
            File::delete('storage/app/public/imgs/sliders/' . $req->old_photo);
        } else {
            $imgName = $req->old_photo;
        }

        $slider = MainSliderMdl::findOrFail($req->slider_id);

        $slider->small_head_en = $req->small_title_en;
        $slider->small_head_ar = $req->small_title_ar;
        $slider->head_ar = $req->title_ar;
        $slider->head_en = $req->title_en;
        $slider->head_en = $req->title_en;
        $slider->link       = $req->link;
        $slider->photo    = $imgName;
        $slider->save();

        Alert()->success(__('general.Record Updated Successfully'));
        return back();
    }
    /**
     * ============================
     * ============================
     */
    public function activate($slider)
    {
        $slider = MainSliderMdl::find($slider);

        $slider->status = 1;
        $slider->save();

        Alert()->success(__('general.Record Activated Successfully'));
        return back();
    }
    /**
     * ============================
     * ============================
     */
    public function deactivate($slider)
    {
        $slider = MainSliderMdl::find($slider);

        $slider->status = 0;
        $slider->save();

        Alert()->success(__('general.Record Deactivated Successfully'));
        return back();
    }
    /**
     * ============================
     * ============================
     */
    public function destroy($slider)
    {
        $slider = MainSliderMdl::find($slider);

        $slider->delete();

        Alert()->success(__('general.Record Deleted Successfully'));
        return back();
    }
    /**
     * ============================
     * ============================
     */
}
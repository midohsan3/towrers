<?php

namespace App\Http\Controllers\Person;

use App\Models\CvMdl;
use App\Models\CityMdl;
use Illuminate\Http\Request;
use App\Models\JobCategoryMdl;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;
use App\Models\CommunicationMdl;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class PCvController extends Controller
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
        $cv = CvMdl::where('user_id', Auth::user()->id)->first();

        if (App::getLocale() == 'ar') {
            $categories = JobCategoryMdl::where('status', 1)->orderBy('name_ar', 'ASC')->get();

            $cities = CityMdl::where('status', 1)->orderBy('name_ar', 'ASC')->get();
        } else {
            $categories = JobCategoryMdl::where('status', 1)->orderBy('name_en', 'ASC')->get();

            $cities = CityMdl::where('status', 1)->orderBy('name_en', 'ASC')->get();
        }

        if ($cv) {
            return view('personCv.edit', compact('cv', 'categories', 'cities'));
        } else {
            $pMail = CommunicationMdl::select('chanel')->where([['user_id', Auth::user()->id], ['con_type', 11]])->first();

            $pPhone = CommunicationMdl::select('chanel')->where([['user_id', Auth::user()->id], ['con_type', 1]])->first();

            $pWhatsApp = CommunicationMdl::select('chanel')->where([['user_id', Auth::user()->id], ['con_type', 3]])->first();
            return view('personCv.create', compact('categories', 'cities', 'pMail', 'pPhone', 'pWhatsApp'));
        }
    }
    /**
     * ============================
     * ============================
     */
    public function store(Request $req)
    {
        $valid = Validator::make($req->all(), [
            'name_ar' => 'nullable|string|min:3',
            'name_en' => 'required|string|min:3',
            'category' => 'required|integer|exists:jobs_categories,id',
            'city'       => 'nullable|integer|exists:cities,id',
            'cv'         => 'required|mimes:pdf',
        ], [
            'company.integer' => __('general.Format Not Matching'),
            'company.exists'   => __('general.This Filed Dosnt Exist'),

            //'name_ar.required' => __('general.Field Is Required'),
            'name_ar.string'    => __('general.Format Not Matching'),
            'name_ar.min'      => __('general.Text Too Short'),

            'name_en.required' => __('general.Field Is Required'),
            'name_en.string'    => __('general.Format Not Matching'),
            'name_en.min'      => __('general.Text Too Short'),

            'category.required' => __('general.Field Is Required'),
            'category.integer'  => __('general.Format Not Matching'),
            'category.exists'    => __('general.This Filed Dosnt Exist'),

            //'city.required' => __('general.Field Is Required'),
            'city.integer'  => __('general.Format Not Matching'),
            'city.exists'    => __('general.This Filed Dosnt Exist'),

            'cv.required'     => __('general.Field Is Required'),
            'cv.mimes'       => __('general.Accepted PDF Only'),
        ]);

        if ($valid->fails()) {
            return back()->withErrors($valid)->withInput($req->all());
        }

        if ($req->hasFile('cv')) {
            $img = $req->file('cv');
            $fileName = rand() . '.' . $img->getClientOriginalExtension();
            Storage::put("public/imgs/jobs/{$fileName}", file_get_contents($req->cv));
        } else {
            $fileName = null;
        }

        if ($req->name_ar == null) {
            $nameAr = $req->name_en;
        } else {
            $nameAr = $req->name_ar;
        }

        CvMdl::create([
            'city_id'            => $req->city,
            'job_category_id' => $req->category,
            'user_id'           => Auth::user()->id,
            'name_en'         => $req->name_en,
            'name_ar'         => $nameAr,
            'description_en'  => $req->description_en,
            'description_ar'  => $req->description_ar,
            'experience'      => $req->experience,
            'cv'                 => $fileName,
            'whats_app'      => $req->whatsapp,
            'phone'           => $req->phone,
            'email'            => $req->email,
        ]);

        Alert()->success(__('general.Record Added Successfully'));
        return back();
    }
    /**
     * ============================
     * ============================
     */
    public function update(Request $req)
    {
        $valid = Validator::make($req->all(), [
            'job'         => 'required|integer|exists:cvs,id',
            'name_ar' => 'required|string|min:3',
            'name_en' => 'required|string|min:3',
            'category' => 'required|integer|exists:jobs_categories,id',
            'city'       => 'nullable|integer|exists:cities,id',
            'cv'         =>  'nullable|mimes:pdf',
        ], [
            'job.required' => __('general.Cant complete Your Request Now'),
            'job.integer'  => __('general.Cant complete Your Request Now'),
            'job.exists'    => __('general.Cant complete Your Request Now'),

            'name_ar.required' => __('general.Field Is Required'),
            'name_ar.string'    => __('general.Format Not Matching'),
            'name_ar.min'      => __('general.Text Too Short'),

            'name_en.required' => __('general.Field Is Required'),
            'name_en.string'    => __('general.Format Not Matching'),
            'name_en.min'      => __('general.Text Too Short'),

            'category.required' => __('general.Field Is Required'),
            'category.integer'  => __('general.Format Not Matching'),
            'category.exists'    => __('general.This Filed Dosnt Exist'),

            //'city.required' => __('general.Field Is Required'),
            'city.integer'  => __('general.Format Not Matching'),
            'city.exists'    => __('general.This Filed Dosnt Exist'),

            'cv.mimes'       => __('general.Image formate is not allowed'),
        ]);

        if ($valid->fails()) {
            return back()->withErrors($valid)->withInput($req->all());
        }

        if ($req->hasFile('license')) {
            $img = $req->file('license');
            $fileName = rand() . '.' . $img->getClientOriginalExtension();
            Storage::put("public/imgs/jobs/{$fileName}", file_get_contents($req->license));
            File::delete('storage/app/public/imgs/jobs/' . $req->old_file);
        } else {
            $fileName = $req->old_file;
        }

        $job = CvMdl::findOrFail($req->job);

        $job->city_id            = $req->city;
        $job->job_category_id = $req->category;
        $job->name_en         = $req->name_en;
        $job->name_ar         = $req->name_ar;
        $job->description_en  = $req->description_en;
        $job->description_ar  = $req->description_ar;
        $job->experience      = $req->experience;
        $job->cv                 = $fileName;
        $job->whats_app      = $req->whatsapp;
        $job->phone            = $req->phone;
        $job->email             = $req->email;
        $job->save();

        Alert()->success(__('general.Record Updated Successfully'));
        return back();
    }
    /**
     * ============================
     * ============================
     */
}
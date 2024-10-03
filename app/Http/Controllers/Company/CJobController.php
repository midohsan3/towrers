<?php

namespace App\Http\Controllers\Company;

use App\Models\JobMdl;
use App\Models\CityMdl;
use Illuminate\Http\Request;
use App\Models\JobCategoryMdl;
use App\Models\CommunicationMdl;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CJobController extends Controller
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
        $jobs = JobMdl::where('user_id', Auth::user()->id)->orderBy('id', 'DESC')->paginate();

        $jobsCount = JobMdl::where('user_id', Auth::user()->id)->count();

        return view('companyJobs.index', compact('jobs', 'jobsCount'));
    }
    /**
     * ============================
     * ============================
     */
    public function create()
    {
        if (App::getLocale() == 'ar') {

            $categories = JobCategoryMdl::where('status', 1)->orderBy('name_ar', 'ASC')->get();

            $cities = CityMdl::where('status', 1)->orderBy('name_ar', 'ASC')->get();
        } else {

            $categories = JobCategoryMdl::where('status', 1)->orderBy('name_en', 'ASC')->get();

            $cities = CityMdl::where('status', 1)->orderBy('name_en', 'ASC')->get();
        }

        $phone = CommunicationMdl::where([['user_id', Auth::user()->id], ['con_type', 1]])->first();

        $whatsApp = CommunicationMdl::where([['user_id', Auth::user()->id], ['con_type', 3]])->first();
        return view('companyJobs.create', compact('categories', 'cities', 'phone', 'whatsApp'));
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
        ], [
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
        ]);

        if ($valid->fails()) {
            return back()->withErrors($valid)->withInput($req->all());
        }

        JobMdl::create([
            'city_id'            => $req->city,
            'job_category_id' => $req->category,
            'user_id'            => Auth::user()->id,
            'name_en'         => $req->name_en,
            'name_ar'         => $req->name_ar,
            'description_en'  => $req->description_en,
            'description_ar'  => $req->description_ar,
            'email'             => $req->email,
            'phone'             => $req->phone,
            'whatsapp'        => $req->whatsapp,
        ]);

        Alert()->success(__('general.Record Added Successfully'));
        return redirect()->route('c-company.job.index');
    }
    /**
     * ============================
     * ============================
     */
    public function edit(JobMdl $job)
    {
        $job::find($job);

        if (App::getLocale() == 'ar') {

            $categories = JobCategoryMdl::where('status', 1)->orderBy('name_ar', 'ASC')->get();

            $cities = CityMdl::where('status', 1)->orderBy('name_ar', 'ASC')->get();
        } else {
            $categories = JobCategoryMdl::where('status', 1)->orderBy('name_en', 'ASC')->get();

            $cities = CityMdl::where('status', 1)->orderBy('name_en', 'ASC')->get();
        }

        return view('companyJobs.edit', compact('job', 'categories', 'cities'));
    }
    /**
     * ============================
     * ============================
     */
    public function update(Request $req)
    {
        $valid = Validator::make($req->all(), [
            'job'         => 'required|integer|exists:jobs,id',
            'name_ar' => 'required|string|min:3',
            'name_en' => 'required|string|min:3',
            'category' => 'required|integer|exists:jobs_categories,id',
            'city'       => 'nullable|integer|exists:cities,id',
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
        ]);

        if ($valid->fails()) {
            return back()->withErrors($valid)->withInput($req->all());
        }

        $job = JobMdl::findOrFail($req->job);

        $job->city_id            = $req->city;
        $job->job_category_id = $req->category;
        $job->name_en         = $req->name_en;
        $job->name_ar         = $req->name_ar;
        $job->description_en  = $req->description_en;
        $job->description_ar  = $req->description_ar;
        $job->email             = $req->email;
        $job->phone            = $req->phone;
        $job->whatsapp       = $req->whatsapp;
        $job->save();

        Alert()->success(__('general.Record Updated Successfully'));
        return back();
    }
    /**
     * ============================
     * ============================
     */
}

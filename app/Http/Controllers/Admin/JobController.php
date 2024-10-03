<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\JobMdl;
use App\Models\CityMdl;
use App\Models\CompanyMdl;
use App\Models\InterestMdl;
use Illuminate\Http\Request;
use App\Notifications\NewJob;
use App\Models\JobCategoryMdl;
use App\Models\UserInterestMdl;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Notification;

class JobController extends Controller
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
        if (App::getLocale() == 'ar') {
            $jobs = JobMdl::orderBy('name_ar')->paginate(pageCount);
        } else {
            $jobs = JobMdl::orderBy('name_ar')->paginate(pageCount);
        }

        $jobsCount = JobMdl::count();

        $list_title = __('general.All');
        return view('job.index', compact('jobs', 'jobsCount', 'list_title'));
    }
    /**
     * ============================
     * ============================
     */
    public function create()
    {
        if (App::getLocale() == 'ar') {
            $companies = CompanyMdl::where('status', 1)->orderBy('name_ar', 'ASC')->get();

            $categories = JobCategoryMdl::where('status', 1)->orderBy('name_ar', 'ASC')->get();

            $cities = CityMdl::where('status', 1)->orderBy('name_ar', 'ASC')->get();
        } else {
            $companies = CompanyMdl::where('status', 1)->orderBy('name_en', 'ASC')->get();

            $categories = JobCategoryMdl::where('status', 1)->orderBy('name_en', 'ASC')->get();

            $cities = CityMdl::where('status', 1)->orderBy('name_en', 'ASC')->get();
        }

        return view('job.create', compact('companies', 'categories', 'cities'));
    }
    /**
     * ============================
     * ============================
     */
    public function store(Request $req)
    {
        $valid = Validator::make($req->all(), [
            'company' => 'nullable|integer|exists:users,id',
            'name_ar' => 'required|string|min:3',
            'name_en' => 'required|string|min:3',
            'category' => 'required|integer|exists:jobs_categories,id',
            'city'       => 'nullable|integer|exists:cities,id',
            'photo'     =>  'nullable|image|mimes:jpeg,png,jpg,gif',
        ], [
            'company.integer' => __('general.Format Not Matching'),
            'company.exists'   => __('general.This Filed Dosnt Exist'),

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

            'photo.image'        => __('general.The file you uploaded is Not Image'),
            'photo.mimes'       => __('general.Image formate is not allowed'),
        ]);

        if ($valid->fails()) {
            return back()->withErrors($valid)->withInput($req->all());
        }

        if ($req->hasFile('photo')) {
            $img = $req->file('photo');
            $imgName = rand() . '.' . $img->getClientOriginalExtension();
            //save file like a temp
            $img->move(('imgs/jobs'), $imgName);
            //RESIZING THE PICTURE AND MAKE A COPY WITH NEW SIZE IN STOREAGE FILE
            $resize = Image::make("imgs/jobs/{$imgName}")->resize(200, 300)->encode('png');
            Storage::put("public/imgs/jobs/{$imgName}", $resize->__toString());
            //delete the file as a temp
            File::delete('imgs/jobs/' . $imgName);
        } else {
            $imgName = null;
        }

        JobMdl::create([
            'city_id'            => $req->city,
            'job_category_id' => $req->category,
            'user_id'            => $req->company,
            'name_en'         => $req->name_en,
            'name_ar'         => $req->name_ar,
            'description_en'  => $req->description_en,
            'description_ar'  => $req->description_ar,
            'email'             => $req->email,
            'phone'             => $req->phone,
            'whatsapp'        => $req->whatsapp,
            'photo'             => $imgName,
        ]);

        Alert()->success(__('general.Record Added Successfully'));
        return redirect()->route('job.index');
    }
    /**
     * ============================
     * ============================
     */
    public function edit(JobMdl $job)
    {
        $job::find($job);

        if (App::getLocale() == 'ar') {
            $companies = CompanyMdl::where('status', 1)->orderBy('name_ar', 'ASC')->get();

            $categories = JobCategoryMdl::where('status', 1)->orderBy('name_ar', 'ASC')->get();

            $cities = CityMdl::where('status', 1)->orderBy('name_ar', 'ASC')->get();
        } else {
            $companies = CompanyMdl::where('status', 1)->orderBy('name_en', 'ASC')->get();

            $categories = JobCategoryMdl::where('status', 1)->orderBy('name_en', 'ASC')->get();

            $cities = CityMdl::where('status', 1)->orderBy('name_en', 'ASC')->get();
        }

        return view('job.edit', compact('job', 'companies', 'categories', 'cities'));
    }
    /**
     * ============================
     * ============================
     */
    public function update(Request $req)
    {
        $valid = Validator::make($req->all(), [
            'job'         => 'required|integer|exists:jobs,id',
            'company' => 'nullable|integer|exists:users,id',
            'name_ar' => 'required|string|min:3',
            'name_en' => 'required|string|min:3',
            'category' => 'required|integer|exists:jobs_categories,id',
            'city'       => 'nullable|integer|exists:cities,id',
            'photo'     =>  'nullable|image|mimes:jpeg,png,jpg,gif',
        ], [
            'job.required' => __('general.Cant complete Your Request Now'),
            'job.integer'  => __('general.Cant complete Your Request Now'),
            'job.exists'    => __('general.Cant complete Your Request Now'),

            'company.integer' => __('general.Format Not Matching'),
            'company.exists'   => __('general.This Filed Dosnt Exist'),

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

            'photo.image'        => __('general.The file you uploaded is Not Image'),
            'photo.mimes'       => __('general.Image formate is not allowed'),
        ]);

        if ($valid->fails()) {
            return back()->withErrors($valid)->withInput($req->all());
        }

        if ($req->hasFile('photo')) {
            $img = $req->file('photo');
            $imgName = rand() . '.' . $img->getClientOriginalExtension();
            //save file like a temp
            $img->move(('imgs/jobs'), $imgName);
            //RESIZING THE PICTURE AND MAKE A COPY WITH NEW SIZE IN STOREAGE FILE
            $resize = Image::make("imgs/jobs/{$imgName}")->resize(200, 300)->encode('png');
            Storage::put("public/imgs/jobs/{$imgName}", $resize->__toString());
            //delete the file as a temp
            File::delete('imgs/jobs/' . $imgName);
            File::delete('storage/app/public/imgs/jobs/' . $req->old_photo);
        } else {
            $imgName = $req->old_photo;
        }

        $job = JobMdl::findOrFail($req->job);

        $job->city_id            = $req->city;
        $job->job_category_id = $req->category;
        $job->user_id            = $req->company;
        $job->name_en         = $req->name_en;
        $job->name_ar         = $req->name_ar;
        $job->description_en  = $req->description_en;
        $job->description_ar  = $req->description_ar;
        $job->email             = $req->email;
        $job->phone            = $req->phone;
        $job->whatsapp       = $req->whatsapp;
        $job->photo            = $imgName;
        $job->save();

        Alert()->success(__('general.Record Updated Successfully'));
        return back();
    }
    /**
     * ============================
     * ============================
     */
    public function activate(Request $req)
    {
        $valid = Validator::make($req->all(), [
            'jobID' => 'required|integer|exists:jobs,id',
        ]);

        if ($valid->fails()) {
            Alert()->error(__('general.Cant complete Your Request Now'));
            return back();
        }

        $job = JobMdl::findOrFail($req->jobID);

        $job->status = 1;
        $job->save();

        $interest = InterestMdl::where([['name_en','Jobs'],['status',1]])->first();

        if($interest){
            $usersInterest =
            UserInterestMdl::select('user_id')->where('interest_id',$interest->id)->get()->pluck('user_id')->toArray();

            $users = User::whereIn('id',$usersInterest)->get();

            Notification::send($users,new NewJob($job->id,$job->name_en,$job->name_ar));
        }

        Alert()->success(__('general.Record Activated Successfully'));
        return back();
    }
    /**
     * ============================
     * ============================
     */
    public function deactivate(Request $req)
    {
        $valid = Validator::make($req->all(), [
            'jobID' => 'required|integer|exists:jobs,id',
        ]);

        if ($valid->fails()) {
            Alert()->error(__('general.Cant complete Your Request Now'));
            return back();
        }

        $job = JobMdl::findOrFail($req->jobID);

        $job->status = 0;
        $job->save();

        Alert()->success(__('general.Record Deactivated Successfully'));
        return back();
    }
    /**
     * ============================
     * ============================
     */
    public function destroy(Request $req)
    {
        $valid = Validator::make($req->all(), [
            'jobID' => 'required|integer|exists:jobs,id',
        ]);

        if ($valid->fails()) {
            Alert()->error(__('general.Cant complete Your Request Now'));
            return back();
        }

        $job = JobMdl::findOrFail($req->jobID);

        File::delete('storage/app/public/imgs/jobs/' . $job->photo);

        $job->delete();

        Alert()->success(__('general.Record Deleted Successfully'));
        return back();
    }
    /**
     * ============================
     * ============================
     */
}

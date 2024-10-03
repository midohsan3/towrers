<?php

namespace App\Http\Controllers\Admin;

use App\Models\CityMdl;
use App\Models\ProjectMdl;
use App\Models\SectionMdl;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;
use App\Models\CompanyProjectMdl;
use App\Models\InterestMdl;
use App\Models\ProjectCategoryMdl;
use App\Models\ProjectPhotoMdl;
use App\Models\User;
use App\Models\UserInterestMdl;
use App\Notifications\NewProject;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Validator;

class ProjectController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('permission:projects-list', ['only' => ['index']]);
        $this->middleware('permission:projects-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:projects-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:projects-activate|projects-deactivate', ['only' => ['activate', 'deactivate']]);
        $this->middleware('permission:projects-delete', ['only' => ['destroy']]);

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
        $projects = ProjectMdl::orderBy('id', 'DESC')->paginate(pageCount);

        $projectsCount = ProjectMdl::count();

        $companies = CompanyProjectMdl::select('id', 'project_id')->get()->countBy('project_id')->all();

        $glaryCount = ProjectPhotoMdl::select('id', 'project_id')->get()->countBy('project_id')->all();

        $list_title = __('general.All');

        return view('projects.index', compact('projects', 'projectsCount', 'companies', 'glaryCount', 'list_title'));
    }
    /**
     * ============================
     * ============================
     */
    public function create()
    {
        if (App::getLocale() == 'ar') {
            $sections = SectionMdl::where('status', 1)->orderBy('name_ar', 'ASC')->get();

            $categories = ProjectCategoryMdl::where('status', 1)->orderBy('name_ar', 'ASC')->get();

            $cities = CityMdl::where('status', 1)->orderBy('name_ar', 'ASC')->get();
        } else {
            $sections = SectionMdl::where('status', 1)->orderBy('name_ar', 'ASC')->get();

            $categories = ProjectCategoryMdl::where('status', 1)->orderBy('name_en', 'ASC')->get();

            $cities = CityMdl::where('status', 1)->orderBy('name_ar', 'ASC')->get();
        }
        return view('projects.create', compact('sections', 'categories', 'cities'));
    }
    /**
     * ============================
     * ============================
     */
    public function store(Request $req)
    {
        $valid = Validator::make($req->all(), [
            'name_ar' => 'required|string|min:3',
            'name_en' => 'required|string|min:3',
            'progress'  => 'required|integer',
            'category'  => 'required|integer|exists:projects_categories,id',
            'city'        => 'required|integer|exists:cities,id',
        ], [
            'name_ar.required' => __('general.Field Is Required'),
            'name_ar.string'    => __('general.Format Not Matching'),
            'name_ar.min'      => __('general.Text Too Short'),
            //'name_ar.regex'    => __('general.Accepted Arabic Only'),

            'name_en.required' => __('general.Name Is Required'),
            'name_en.string'    => __('general.Format Not Matching'),
            'name_en.min'      => __('general.Text Too Short'),
            //'name_en.regex'    => __('general.Accepted English Only'),

            'progress.required' => __('general.Field Is Required'),
            'progress.integer'   => __('general.Format Not Matching'),

            'category.required' => __('general.Field Is Required'),
            'category.integer'   => __('general.Format Not Matching'),
            'category.exists'     => __('general.This Filed Dosnt Exist'),

            'city.required' => __('general.Field Is Required'),
            'city.integer'   => __('general.Format Not Matching'),
            'city.exists'     => __('general.This Filed Dosnt Exist'),
        ]);

        if ($valid->fails()) {
            return back()->withErrors($valid)->withInput($req->all());
        }

        ProjectMdl::create([
            'project_category_id' => $req->category,
            'city_id'                 => $req->city,
            'name_en'              => $req->name_en,
            'name_ar'              => $req->name_ar,
            'progress'              => $req->progress,
            'description_ar'       => $req->description_ar,
            'description_en'       => $req->description_en,
            'address'               => $req->address,
            'lat'                     => $req->lat,
            'lng'                     => $req->lng,
        ]);

        Alert()->success(__('general.Record Added Successfully'));
        return redirect()->route('project.index');
    }
    /**
     * ============================
     * ============================
     */
    public function edit(ProjectMdl $project)
    {
        $project::find($project);

        if (App::getLocale() == 'ar') {
            $sections = SectionMdl::where('status', 1)->orderBy('name_ar', 'ASC')->get();

            $categories = ProjectCategoryMdl::where('status', 1)->orderBy('name_ar', 'ASC')->get();

            $cities = CityMdl::where('status', 1)->orderBy('name_ar', 'ASC')->get();
        } else {
            $sections = SectionMdl::where('status', 1)->orderBy('name_ar', 'ASC')->get();

            $categories = ProjectCategoryMdl::where('status', 1)->orderBy('name_en', 'ASC')->get();

            $cities = CityMdl::where('status', 1)->orderBy('name_ar', 'ASC')->get();
        }

        return view('projects.edit', compact('project', 'sections', 'categories', 'cities'));
    }
    /**
     * ============================
     * ============================
     */
    public function update(Request $req)
    {
        $valid = Validator::make($req->all(), [
            'project_id' => 'required|integer|exists:projects,id',
            'name_ar' => 'required|string|min:3',
            'name_en' => 'required|string|min:3',
            'progress'  => 'required|integer',
            'category'  => 'required|integer|exists:projects_categories,id',
            'city_id'        => 'required|integer|exists:cities,id',
        ], [
            'project_id.required' => __('general.Cant complete Your Request Now'),
            'project_id.integer'  => __('general.Cant complete Your Request Now'),
            'project_id.exists'   => __('general.Cant complete Your Request Now'),

            'name_ar.required' => __('general.Field Is Required'),
            'name_ar.string'    => __('general.Format Not Matching'),
            'name_ar.min'      => __('general.Text Too Short'),
            //'name_ar.regex'    => __('general.Accepted Arabic Only'),

            'name_en.required' => __('general.Name Is Required'),
            'name_en.string'    => __('general.Format Not Matching'),
            'name_en.min'      => __('general.Text Too Short'),
            //'name_en.regex'    => __('general.Accepted English Only'),

            'progress.required' => __('general.Field Is Required'),
            'progress.integer'   => __('general.Format Not Matching'),

            'category.required' => __('general.Field Is Required'),
            'category.integer'   => __('general.Format Not Matching'),
            'category.exists'     => __('general.This Filed Dosnt Exist'),

            'city.required' => __('general.Field Is Required'),
            'city.integer'   => __('general.Format Not Matching'),
            'city.exists'     => __('general.This Filed Dosnt Exist'),
        ]);

        if ($valid->fails()) {
            return back()->withErrors($valid)->withInput($req->all());
        }

        $project = ProjectMdl::findOrFail($req->project_id);

        $project->city_id                  = $req->city_id;
        $project->project_category_id = $req->category;
        $project->name_en              = $req->name_en;
        $project->name_ar              = $req->name_ar;
        $project->progress              = $req->progress;
        $project->description_ar       = $req->description_ar;
        $project->description_en       = $req->description_en;
        $project->address                = $req->address;
        $project->lat                      = $req->lat;
        $project->lng                      = $req->long;
        $project->save();

        Alert()->success(__('general.Record Updated Successfully'));
        return back();
    }
    /**
     * ============================
     * ============================
     */
    public function featured(Request $req)
    {
        $valid = Validator::make($req->all(), [
            'projectID' => 'required|integer|exists:projects,id'
        ]);

        if ($valid->fails()) {
            Alert()->error(__('general.Cant complete Your Request Now'));
            return back();
        }

        $project = ProjectMdl::findOrFail($req->projectID);

        $project->featured = 1;
        $project->save();

        Alert()->success(__('general.Record Activated Successfully'));

        return back();
    }
    /**
     * ============================
     * ============================
     */
    public function normalize(Request $req)
    {
        $valid = Validator::make($req->all(), [
            'projectID' => 'required|integer|exists:projects,id'
        ]);

        if ($valid->fails()) {
            Alert()->error(__('general.Cant complete Your Request Now'));
            return back();
        }

        $project = ProjectMdl::findOrFail($req->projectID);

        $project->featured = 0;
        $project->save();

        Alert()->success(__('general.Record Deactivate Successfully'));

        return back();
    }
    /**
     * ============================
     * ============================
     */
    public function activate(Request $req)
    {
        $valid = Validator::make($req->all(), [
            'projectID' => 'required|integer|exists:projects,id'
        ]);

        if ($valid->fails()) {
            Alert()->error(__('general.Cant complete Your Request Now'));
            return back();
        }

        $project = ProjectMdl::findOrFail($req->projectID);

        $project->status = 1;
        $project->save();

        $interests =InterestMdl::where([['name_en','Projects'],['status',1]])->first();

        if($interests){
            $usersInterests =
            UserInterestMdl::select('user_id')->where('interest_id',$interests->id)->get()->pluck('user_id')->toArray();

            $users = User::whereIn('id',$usersInterests)->get();

            Notification::send($users, new NewProject($project->id,$project->name_en,$project->name_ar));
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
            'projectID' => 'required|integer|exists:projects,id'
        ]);

        if ($valid->fails()) {
            Alert()->error(__('general.Cant complete Your Request Now'));
            return back();
        }

        $project = ProjectMdl::findOrFail($req->projectID);

        $project->status = 0;
        $project->save();

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
            'projectID' => 'required|integer|exists:projects,id'
        ]);

        if ($valid->fails()) {
            Alert()->error(__('general.Cant complete Your Request Now'));
            return back();
        }

        $project = ProjectMdl::findOrFail($req->projectID);

        $photos = ProjectPhotoMdl::where('project_id', $project->id)->get();

        foreach ($photos as $photo) {
            $photo->forceDelete();
        }

        $companyProjects = CompanyProjectMdl::where('project_id',$project->id)->get();
            if($companyProjects->count()>0){
            foreach($companyProjects as $project){
            $project->forceDelete();
            }
        }

        $project->delete();

        Alert()->success(__('general.Record Deleted Successfully'));

        return back();
    }
    /**
     * ============================
     * ============================
     */
}
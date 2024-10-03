<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\OldProjectMdl;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class OldProjectController extends Controller
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
    public function index($user)
    {
        $user = User::find($user);

        $oldProjects = OldProjectMdl::where('user_id', $user->id)->orderBy('id', 'DESC')->paginate(pageCount);

        $oldProjectsCount = OldProjectMdl::where('user_id', $user->id)->count();

        return view('oldProjects.index', compact('user', 'oldProjects', 'oldProjectsCount'));
    }
    /**
     * ============================
     * ============================
     */
    public function create($user)
    {
        $user = User::find($user);

        return view('oldProjects.create', compact('user'));
    }
    /**
     * ============================
     * ============================
     */
    public function store(Request $req)
    {
        $valid = Validator::make($req->all(), [
            'user' => 'required|integer|exists:users,id',
            'name_ar'    => 'required|string',
            'name_en'    => 'required|string',
        ], [
            'user.required' => __('general.Cant complete Your Request Now'),
            'user.integer'  => __('general.Cant complete Your Request Now'),
            'user.exists'    => __('general.Cant complete Your Request Now'),

            'name_ar.required' => __('general.Field Is Required'),
            'name_ar.string'    => __('general.Format Not Matching'),

            'name_en.required' => __('general.Field Is Required'),
            'name_en.string'    => __('general.Format Not Matching'),
        ]);

        if ($valid->fails()) {
            return back()->withErrors($valid)->withInput($req->all());
        }

        OldProjectMdl::create([
            'user_id'          => $req->user,
            'name_en'        => $req->name_en,
            'name_ar'        => $req->name_ar,
            'description_en' => $req->description_en,
            'description_ar' => $req->description_ar,
        ]);

        Alert()->success(__('general.Record Added Successfully'));
        return back();
    }
    /**
     * ============================
     * ============================
     */
    public function edit($project)
    {
        $project = OldProjectMdl::find($project);

        $user = User::find($project->user_id);

        return view('oldProjects.edit', compact('project', 'user'));
    }
    /**
     * ============================
     * ============================
     */
    public function update(Request $req)
    {
        $valid = Validator::make($req->all(), [
            'project'      => 'required|integer|exists:old_projects,id',
            'name_ar'    => 'required|string',
            'name_en'    => 'required|string',
        ], [
            'project.required' => __('general.Cant complete Your Request Now'),
            'project.integer'  => __('general.Cant complete Your Request Now'),
            'project.exists'    => __('general.Cant complete Your Request Now'),

            'name_ar.required' => __('general.Field Is Required'),
            'name_ar.string'    => __('general.Format Not Matching'),

            'name_en.required' => __('general.Field Is Required'),
            'name_en.string'    => __('general.Format Not Matching'),
        ]);

        if ($valid->fails()) {
            return back()->withErrors($valid)->withInput($req->all());
        }

        $project = OldProjectMdl::findOrFail($req->project);

        $project->name_en        = $req->name_en;
        $project->name_ar        = $req->name_ar;
        $project->description_en = $req->description_en;
        $project->description_ar = $req->description_ar;
        $project->save();

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
            'projectID' => 'required|integer|exists:old_projects,id'
        ]);

        if ($valid->fails()) {
            Alert()->error(__('general.Cant complete Your Request Now'));
            return back();
        }

        $oldProject = OldProjectMdl::findOrFail($req->projectID);

        $oldProject->delete();

        Alert()->success(__('general.Record Deleted Successfully'));
        return back();
    }
    /**
     * ============================
     * ============================
     */
}

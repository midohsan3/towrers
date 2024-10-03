<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CompanyMdl;
use App\Models\CompanyProjectMdl;
use App\Models\ProjectMdl;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProjectByCompanyController extends Controller
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
    public function index($company)
    {
        $company = CompanyMdl::find($company);

        $currentProjects = $company->company_has_projects;

        $projectsCount = $company->company_has_projects->count();

        $projects = ProjectMdl::where('status', 1)->get();

        return view('projectsByCompany.index', compact('company', 'currentProjects', 'projectsCount', 'projects'));
    }
    /**
     * ============================
     * ============================
     */
    public function store(Request $req)
    {

        $valid = Validator::make($req->all(), [
            'company' => 'required|integer|exists:companies,id',
            'project'    => 'required|integer|exists:projects,id',
        ]);

        if ($valid->fails()) {
            Alert()->error(__('general.Cant complete Your Request Now'));
            return back();
        }

        $checkRec = CompanyProjectMdl::where([['company_id', $req->company], ['project_id', $req->project]])->first();

        if ($checkRec) {
            $checkRec->forceDelete();
        }

        $companyRec = CompanyMdl::findOrFail($req->company);

        $companyRec->company_has_projects()->attach($req->project);

        Alert()->success(__('general.Record Added Successfully'));
        return back();
    }
    /**
     * ============================
     * ============================
     */
    public function destroy(Request $req)
    {
        $valid = Validator::make($req->all(), [
            'companyID' => 'required|integer|exists:companies,id',
            'projectID' => 'required|integer|exists:projects,id',
        ]);

        if ($valid->fails()) {
            Alert()->error(__('general.Cant complete Your Request Now'));
            return back();
        }

        $rec = CompanyProjectMdl::where([['company_id', $req->companyID], ['project_id', $req->projectID]])->first();

        $rec->forceDelete();

        Alert()->success(__('general.Record Deleted Successfully'));
        return back();
    }
    /**
     * ============================
     * ============================
     */
}

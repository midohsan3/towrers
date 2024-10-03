<?php

namespace App\Http\Controllers\Admin;

use App\Models\CompanyMdl;
use App\Models\ProjectMdl;
use Illuminate\Http\Request;
use App\Models\CompanyProjectMdl;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class CompanyByProject extends Controller
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
    public function index($project)
    {
        $project = ProjectMdl::find($project);

        $currentCompanies = $project->project_has_companies;

        $companiesCount = $project->project_has_companies->count();

        $companies = CompanyMdl::where('status', 1)->get();

        return view('companyByProject.index', compact('project', 'currentCompanies', 'companiesCount', 'companies'));
    }
    /**
     * ============================
     * ============================
     */
    public function store(Request $req)
    {
        $valid = Validator::make($req->all(), [
            'project'    => 'required|integer|exists:projects,id',
            'company' => 'required|integer|exists:companies,id',
        ]);

        if ($valid->fails()) {
            Alert()->error(__('general.Cant complete Your Request Now'));
            return back();
        }


        $checkRec = CompanyProjectMdl::where([['company_id', $req->company], ['project_id', $req->project]])->first();

        if ($checkRec) {
            $checkRec->forceDelete();
        }

        $project = ProjectMdl::findOrFail($req->project);

        $project->project_has_companies()->attach($req->company);

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
            'projectID'    => 'required|integer|exists:projects,id',
            'companyID'    => 'required|integer|exists:companies,id',
        ]);

        if ($valid->fails()) {
            Alert()->error(__('general.Cant complete Your Request Now'));
            return back();
        }

        $rel = CompanyProjectMdl::where([['project_id', $req->projectID], ['company_id', $req->companyID]])->first();

        $rel->forceDelete();

        Alert()->success(__('general.Record Deleted Successfully'));
        return back();
    }
    /**
     * ============================
     * ============================
     */
}

<?php

namespace App\Http\Controllers\Company;

use App\Models\CompanyMdl;
use App\Models\SectionMdl;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\CompanyMajorMdl;
use App\Models\MajorMdl;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CSectionController extends Controller
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
        $sections = SectionMdl::where('status', 1)->orderBy('id', 'ASC')->get();

        return view('companySection.choose', compact('sections'));
    }
    /**
     * ============================
     * ============================
     */
    public function store(Request $req)
    {
        $valid = Validator::make($req->all(), [
            'section_id' => 'required|integer|exists:sections,id'
        ]);

        if ($valid->fails()) {
            Alert()->error(__('general.Cant complete Your Request Now'));
            return back();
        }

        $company = CompanyMdl::where('user_id', Auth::user()->id)->first();

        $company->section_id = $req->section_id;
        $company->save();

        Alert()->success(__('section.You Change Your Section Successfully'));
        return redirect()->route('home');
    }
    /**
     * ============================
     * ============================
     */
    public function majors()
    {
        if (Auth::user()->companyUser->section_id == null) {
            return redirect()->route('c-company.section.index');
        }
        $majors = MajorMdl::where('section_id', Auth::user()->companyUser->section_id)->get();

        $companyMajors = CompanyMajorMdl::where('company_id', Auth::user()->companyUser->id)->get()->pluck('major_id')->all();
        return view('companySection.majors', compact('majors', 'companyMajors'));
    }
    /**
     * ============================
     * ============================
     */
    public function storeMajors(Request $req)
    {
        $valid = Validator::make($req->all(), [
            'major' => 'required',
        ]);

        if ($valid->fails()) {
            Alert()->error(__('general.Cant complete Your Request Now'));
            return back();
        }

        $company = CompanyMdl::where('user_id', Auth::user()->id)->first();

        $company->company_has_major()->sync($req->major);

        Alert()->success(__('general.Record Updated Successfully'));
        return redirect()->route('home');
    }
    /**
     * ============================
     * ============================
     */
}

<?php

namespace App\Http\Controllers\Company;

use Illuminate\Http\Request;
use App\Models\OldProjectMdl;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CProjectController extends Controller
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
        $oldProjects = OldProjectMdl::where('user_id', Auth::user()->id)->orderBy('id', 'DESC')->paginate(pageCount);

        $oldProjectsCount = OldProjectMdl::where('user_id', Auth::user()->id)->count();

        return view('companyProjects.index', compact('oldProjects', 'oldProjectsCount'));
    }
    /**
     * ============================
     * ============================
     */
    public function create()
    {
        return view('companyProjects.create');
    }
    /**
     * ============================
     * ============================
     */
    public function store(Request $req)
    {
        $valid = Validator::make($req->all(), [
            'name_ar'    => 'nullable|string',
            'name_en'    => 'required|string',
        ], [
            //'name_ar.required' => __('general.Field Is Required'),
            'name_ar.string'    => __('general.Format Not Matching'),

            'name_en.required' => __('general.Field Is Required'),
            'name_en.string'    => __('general.Format Not Matching'),
        ]);

        if ($valid->fails()) {
            return back()->withErrors($valid)->withInput($req->all());
        }

        if ($req->name_ar == null) {
            $name_ar = $req->name_en;
        } else {
            $name_ar = $req->name_ar;
        }

        OldProjectMdl::create([
            'user_id'          => Auth::user()->id,
            'name_en'        => $req->name_en,
            'name_ar'        => $name_ar,
            'description_en' => $req->description_en,
            'description_ar' => $req->description_ar,
        ]);

        Alert()->success(__('general.Record Added Successfully'));
        return redirect()->route('c-company.project.index');
    }
    /**
     * ============================
     * ============================
     */

    /**
     * ============================
     * ============================
     */
}

<?php

namespace App\Http\Controllers\Admin;

use App\Models\MajorMdl;
use App\Models\SectionMdl;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class MajorController extends Controller
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
            $majors = MajorMdl::orderBy('name_ar', 'ASC')->paginate(pageCount);
        } else {
            $majors = MajorMdl::orderBy('name_en', 'ASC')->paginate(pageCount);
        }

        $majorsCount = MajorMdl::count();

        $list_title = __('general.All');

        return view('majors.index', compact('majors', 'majorsCount', 'list_title'));
    }
    /**
     * ============================
     * ============================
     */
    public function create()
    {
        if (App::getLocale() == 'ar') {
            $sections = SectionMdl::where('status', 1)->orderBy('name_ar', 'ASC')->get();
        } else {
            $sections = SectionMdl::where('status', 1)->orderBy('name_en', 'ASC')->get();
        }

        return view('majors.create', compact('sections'));
    }
    /**
     * ============================
     * ============================
     */
    public function store(Request $req)
    {
        $valid = Validator::make($req->all(), [
            'section_id' => 'required|integer|exists:sections,id',
            'name_ar' => 'required|unique:sections,name_ar|string|min:3',
            'name_en' => 'required|unique:sections,name_en|string|min:3',
        ], [
            'section_id.required' => __('general.Field Is Required'),
            'section_id.integer'   => __('general.Format Not Matching'),
            'section_id.exists'     => __('general.This Filed Dosnt Exist'),

            'name_ar.required' => __('general.Field Is Required'),
            'name_ar.unique'   => __('general.This Field Already Exists'),
            'name_ar.string'    => __('general.Format Not Matching'),
            'name_ar.min'      => __('general.Text Too Short'),
            //'name_ar.regex'    => __('general.Accepted Arabic Only'),

            'name_en.required' => __('general.Name Is Required'),
            'name_en.unique'   => __('general.This Field Already Exists'),
            'name_en.string'    => __('general.Format Not Matching'),
            'name_en.min'      => __('general.Text Too Short'),
            //'name_en.regex'    => __('general.Accepted English Only'),
        ]);

        if ($valid->fails()) {
            return back()->withErrors($valid)->withInput($req->all());
        }

        MajorMdl::create([
            'section_id' => $req->section_id,
            'name_en' => $req->name_en,
            'name_ar' => $req->name_ar,
        ]);

        Alert()->success(__('general.Record Added Successfully'));
        return redirect()->route('major.index');
    }
    /**
     * ============================
     * ============================
     */
    public function show($major)
    {
        $major = MajorMdl::find($major);

        return view('majors.show', compact('major'));
    }
    /**
     * ============================
     * ============================
     */
    public function edit($major)
    {
        $major = MajorMdl::find($major);

        $sections = SectionMdl::where('status', 1)->get();

        return view('majors.edit', compact('major', 'sections'));
    }
    /**
     * ============================
     * ============================
     */
    public function update(Request $req)
    {
        $valid = Validator::make($req->all(), [
            'major_id' => 'required|integer|exists:majors,id',
            'section_id' => 'required|integer|exists:sections,id',
            'name_ar' => 'required|unique:sections,name_ar,' . $req->major_id . '|string|min:3',
            'name_en' => 'required|unique:sections,name_en,' . $req->major_id . '|string|min:3',
        ], [
            'major_id.required' => __('general.Field Is Required'),
            'major_id.integer'   => __('general.Format Not Matching'),
            'major_id.exists'     => __('general.This Filed Dosnt Exist'),

            'section_id.required' => __('general.Field Is Required'),
            'section_id.integer'   => __('general.Format Not Matching'),
            'section_id.exists'     => __('general.This Filed Dosnt Exist'),

            'name_ar.required' => __('general.Field Is Required'),
            'name_ar.unique'   => __('general.This Field Already Exists'),
            'name_ar.string'    => __('general.Format Not Matching'),
            'name_ar.min'      => __('general.Text Too Short'),
            //'name_ar.regex'    => __('general.Accepted Arabic Only'),

            'name_en.required' => __('general.Name Is Required'),
            'name_en.unique'   => __('general.This Field Already Exists'),
            'name_en.string'    => __('general.Format Not Matching'),
            'name_en.min'      => __('general.Text Too Short'),
            //'name_en.regex'    => __('general.Accepted English Only'),
        ]);

        if ($valid->fails()) {
            return back()->withErrors($valid)->withInput($req->all());
        }

        $major = MajorMdl::findOrFail($req->major_id);

        $major->section_id = $req->section_id;
        $major->name_en = $req->name_en;
        $major->name_ar = $req->name_ar;
        $major->save();

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
            'majorID' => 'required|integer|exists:majors,id',
        ]);

        if ($valid->fails()) {
            Alert()->error(__('general.Cant complete Your Request Now'));
            return back();
        }

        $major = MajorMdl::findOrFail($req->majorID);

        $major->status = 1;
        $major->save();

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
            'majorID' => 'required|integer|exists:majors,id',
        ]);

        if ($valid->fails()) {
            Alert()->error(__('general.Cant complete Your Request Now'));
            return back();
        }

        $major = MajorMdl::findOrFail($req->majorID);

        $major->status = 0;
        $major->save();

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
            'majorID' => 'required|integer|exists:majors,id',
        ]);

        if ($valid->fails()) {
            Alert()->error(__('general.Cant complete Your Request Now'));
            return back();
        }

        $major = MajorMdl::findOrFail($req->majorID);

        $major->delete();

        Alert()->success(__('general.Record Deleted Successfully'));
        return back();
    }
    /**
     * ============================
     * ============================
     */
}

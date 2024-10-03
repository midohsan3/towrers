<?php

namespace App\Http\Controllers\Admin;

use App\Models\SectionMdl;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;
use App\Models\MajorMdl;
use Illuminate\Support\Facades\Validator;

class SectionController extends Controller
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
            $sections = SectionMdl::orderBy('name_ar', 'ASC')->paginate(pageCount);
        } else {
            $sections = SectionMdl::orderBy('name_en', 'ASC')->paginate(pageCount);
        }

        $sectionsCount = SectionMdl::count();

        $majors = MajorMdl::select('id', 'section_id')->get()->countBy('section_id')->all();

        $list_title = __('general.All');

        return view('section.index', compact('sections', 'sectionsCount', 'majors', 'list_title'));
    }
    /**
     * ============================
     * ============================
     */
    public function create()
    {
        return view('section.create');
    }
    /**
     * ============================
     * ============================
     */
    public function store(Request $req)
    {
        $valid = Validator::make($req->all(), [
            'name_ar' => 'required|unique:sections,name_ar|string|min:3',
            'name_en' => 'required|unique:sections,name_en|string|min:3',
        ], [
            'name_ar.required' => __('general.Field Is Required'),
            'name_ar.unique'   => __('general.This Field Already Exists'),
            'name_ar.string'    => __('general.Format Not Matching'),
            'name_ar.min'      => __('general.Text Too Short'),
            //'name_ar.regex'    => __('general.Accepted Arabic Only'),

            'name_en.required' => __('general.Name Is Required'),
            'name_en.unique'   => __('general.This Field Already Exists'),
            'name_en.string'    => __('general.Format Not Matching'),
            'name_en.min'      => __('general.Text Too Short'),
            // 'name_en.regex'    => __('general.Accepted English Only'),
        ]);

        if ($valid->fails()) {
            return back()->withErrors($valid)->withInput($req->all());
        }

        SectionMdl::create([
            'name_en' => $req->name_en,
            'name_ar' => $req->name_ar,
        ]);

        Alert()->success(__('general.Record Added Successfully'));
        return redirect()->route('section.index');
    }
    /**
     * ============================
     * ============================
     */
    public function show(SectionMdl $section)
    {
        $section::find($section);

        $majors = MajorMdl::where('section_id', $section->id)->count();

        return view('section.show', compact('section', 'majors'));
    }
    /**
     * ============================
     * ============================
     */
    public function edit(SectionMdl $section)
    {
        $section::find($section);

        return view('section.edit', compact('section'));
    }
    /**
     * ============================
     * ============================
     */
    public function update(Request $req)
    {
        $valid = Validator::make($req->all(), [
            'section_id' => 'required|integer|exists:sections,id',
            'name_ar' => 'required|unique:sections,name_ar,' . $req->section_id . '|string|min:3',
            'name_en' => 'required|unique:sections,name_en,' . $req->section_id . '|string|min:3',
        ], [
            'section_id.required' => __('general.Field Is Required'),
            'section_id.integer'  => __('general.Format Not Matching'),
            'section_id.exists'    => __('general.This Filed Dosnt Exist'),

            'name_ar.required' => __('general.Field Is Required'),
            'name_ar.unique'   => __('general.This Field Already Exists'),
            'name_ar.string'    => __('general.Format Not Matching'),
            'name_ar.min'      => __('general.Text Too Short'),

            'name_en.required' => __('general.Name Is Required'),
            'name_en.unique'   => __('general.This Field Already Exists'),
            'name_en.string'    => __('general.Format Not Matching'),
            'name_en.min'      => __('general.Text Too Short'),
        ]);

        if ($valid->fails()) {
            return back()->withErrors($valid)->withInput($req->all());
        }

        $section = SectionMdl::findOrFail($req->section_id);

        $section->name_en = $req->name_en;
        $section->name_ar = $req->name_ar;
        $section->save();

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
            'sectionID' => 'required|integer|exists:sections,id',
        ]);

        if ($valid->fails()) {
            Alert()->error(__('general.Cant complete Your Request Now'));
            return back();
        }

        $section = SectionMdl::findOrFail($req->sectionID);


        $section->status = 1;
        $section->save();

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
            'sectionID' => 'required|integer|exists:sections,id',
        ]);

        if ($valid->fails()) {
            Alert()->error(__('general.Cant complete Your Request Now'));
            return back();
        }


        $section = SectionMdl::findOrFail($req->sectionID);


        $section->status = 0;
        $section->save();

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
            'sectionID' => 'required|integer|exists:sections,id',
        ]);

        if ($valid->fails()) {
            Alert()->error(__('general.Cant complete Your Request Now'));
            return back();
        }

        $section = SectionMdl::findOrFail($req->sectionID);


        $section->delete();

        Alert()->success(__('general.Record Deleted Successfully'));
        return back();
    }
    /**
     * ============================
     * ============================
     */
}

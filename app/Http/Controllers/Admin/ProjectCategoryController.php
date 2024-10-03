<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\ProjectCategoryMdl;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class ProjectCategoryController extends Controller
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
            $sections = ProjectCategoryMdl::orderBy('name_ar', 'ASC')->paginate(pageCount);
        } else {
            $sections = ProjectCategoryMdl::orderBy('name_en', 'ASC')->paginate(pageCount);
        }

        $sectionsCount = ProjectCategoryMdl::count();

        $list_title = __('general.All');

        return view('projectCategory.index', compact('sections', 'sectionsCount', 'list_title'));
    }
    /**
     * ============================
     * ============================
     */
    public function create()
    {
        return view('projectCategory.create');
    }
    /**
     * ============================
     * ============================
     */
    public function store(Request $req)
    {
        $valid = Validator::make($req->all(), [
            'name_ar' => 'required|unique:projects_categories,name_ar|string|min:3',
            'name_en' => 'required|unique:projects_categories,name_en|string|min:3',
        ], [
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

        ProjectCategoryMdl::create([
            'name_en' => $req->name_en,
            'name_ar' => $req->name_ar,
        ]);

        Alert()->success(__('general.Record Added Successfully'));
        return redirect()->route('project.category.index');
    }
    /**
     * ============================
     * ============================
     */
    public function edit($category)
    {
        $section  = ProjectCategoryMdl::find($category);

        return view('projectCategory.edit', compact('section'));
    }
    /**
     * ============================
     * ============================
     */
    public function update(Request $req)
    {
        $valid = Validator::make($req->all(), [
            'section_id' => 'required|integer|exists:projects_categories,id',
            'name_ar' => 'required|unique:projects_categories,name_ar,' . $req->section_id . '|string|min:3',
            'name_en' => 'required|unique:projects_categories,name_en,' . $req->section_id . '|string|min:3',
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

        $category = ProjectCategoryMdl::findOrFail($req->section_id);

        $category->name_en = $req->name_en;
        $category->name_ar = $req->name_ar;
        $category->save();

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
            'sectionID' => 'required|integer|exists:projects_categories,id',
        ]);

        if ($valid->fails()) {
            Alert()->error(__('general.Cant complete Your Request Now'));
            return back();
        }

        $category = ProjectCategoryMdl::findOrFail($req->sectionID);

        $category->status = 1;
        $category->save();

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
            'sectionID' => 'required|integer|exists:projects_categories,id',
        ]);

        if ($valid->fails()) {
            Alert()->error(__('general.Cant complete Your Request Now'));
            return back();
        }

        $category = ProjectCategoryMdl::findOrFail($req->sectionID);

        $category->status = 0;
        $category->save();

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
            'sectionID' => 'required|integer|exists:projects_categories,id',
        ]);

        if ($valid->fails()) {
            Alert()->error(__('general.Cant complete Your Request Now'));
            return back();
        }

        $category = ProjectCategoryMdl::findOrFail($req->sectionID);

        $category->delete();

        Alert()->success(__('general.Record Deleted Successfully'));
        return back();
    }
    /**
     * ============================
     * ============================
     */
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductCategoryMdl;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductCategoryController extends Controller
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
        $sections = ProductCategoryMdl::orderBy('id', 'DESC')->paginate(pageCount);

        $sectionsCount = ProductCategoryMdl::count();

        $list_title = __('general.All');

        return view('productCategory.index', compact('sections', 'sectionsCount', 'list_title'));
    }
    /**
     * ============================
     * ============================
     */
    public function create()
    {
        return view('productCategory.create');
    }
    /**
     * ============================
     * ============================
     */
    public function store(Request $req)
    {
        $valid = Validator::make($req->all(), [
            'name_ar' => 'required|unique:products_categories,name_ar|string|min:3',
            'name_en' => 'required|unique:products_categories,name_en|string|min:3',
        ], [
            'name_ar.required' => __('general.Field Is Required'),
            'name_ar.unique'   => __('general.This Field Already Exists'),
            'name_ar.string'    => __('general.Format Not Matching'),
            'name_ar.min'      => __('general.Text Too Short'),

            'name_en.required' => __('general.Field Is Required'),
            'name_en.unique'   => __('general.This Field Already Exists'),
            'name_en.string'    => __('general.Format Not Matching'),
            'name_en.min'      => __('general.Text Too Short'),
        ]);

        if ($valid->fails()) {
            return back()->withErrors($valid)->withInput($req->all());
        }

        ProductCategoryMdl::create([
            'name_en' => $req->name_en,
            'name_ar' => $req->name_ar,
        ]);

        Alert()->success(__('general.Record Added Successfully'));
        return redirect()->route('product.category.index');
    }
    /**
     * ============================
     * ============================
     */
    public function edit($section)
    {
        $section = ProductCategoryMdl::find($section);
        return view('productCategory.edit', compact('section'));
    }
    /**
     * ============================
     * ============================
     */
    public function update(Request $req)
    {
        $valid = Validator::make($req->all(), [
            'section_id' => 'required|integer|exists:products_categories,id',
            'name_ar'  => 'required|unique:products_categories,name_ar,' . $req->section_id . '|string|min:3',
            'name_en' => 'required|unique:products_categories,name_en,' . $req->section_id . '|string|min:3',
        ], [
            'section_id.required' => __('general.Cant complete Your Request Now'),
            'section_id.integer'  => __('general.Cant complete Your Request Now'),
            'section_id.exists'    => __('general.Cant complete Your Request Now'),

            'name_ar.required' => __('general.Field Is Required'),
            'name_ar.unique'   => __('general.This Field Already Exists'),
            'name_ar.string'    => __('general.Format Not Matching'),
            'name_ar.min'      => __('general.Text Too Short'),

            'name_en.required' => __('general.Field Is Required'),
            'name_en.unique'   => __('general.This Field Already Exists'),
            'name_en.string'    => __('general.Format Not Matching'),
            'name_en.min'      => __('general.Text Too Short'),
        ]);

        if ($valid->fails()) {
            return back()->withErrors($valid)->withInput($req->all());
        }

        $section = ProductCategoryMdl::findOrFail($req->section_id);

        $section->name_ar = $req->name_ar;
        $section->name_en = $req->name_en;
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
            'sectionID' => 'required|integer|exists:products_categories,id',
        ]);

        if ($valid->fails()) {
            Alert()->error(__('general.Cant complete Your Request Now'));
            return back();
        }

        $section = ProductCategoryMdl::findOrFail($req->sectionID);

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
            'sectionID' => 'required|integer|exists:products_categories,id',
        ]);

        if ($valid->fails()) {
            Alert()->error(__('general.Cant complete Your Request Now'));
            return back();
        }

        $section = ProductCategoryMdl::findOrFail($req->sectionID);

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
            'sectionID' => 'required|integer|exists:products_categories,id',
        ]);

        if ($valid->fails()) {
            Alert()->error(__('general.Cant complete Your Request Now'));
            return back();
        }

        $section = ProductCategoryMdl::findOrFail($req->sectionID);

        $section->delete();

        Alert()->success(__('general.Record Deleted Successfully'));
        return back();
    }
    /**
     * ============================
     * ============================
     */
}

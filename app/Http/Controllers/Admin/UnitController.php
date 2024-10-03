<?php

namespace App\Http\Controllers\Admin;

use App\Models\UnitMdl;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class UnitController extends Controller
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
        $units = UnitMdl::orderBy('id', 'DESC')->paginate(pageCount);

        $unitsCount = UnitMdl::count();

        $list_title = __('general.All');

        return view('units.index', compact('units', 'unitsCount', 'list_title'));
    }
    /**
     * ============================
     * ============================
     */
    public function create()
    {
        return view('units.create');
    }
    /**
     * ============================
     * ============================
     */
    public function store(Request $req)
    {
        $valid = Validator::make($req->all(), [
            'name_ar' => 'required|unique:units,name_ar|string',
            'name_en' => 'required|unique:units,name_en|string',
        ], [
            'name_ar.required' => __('general.Field Is Required'),
            'name_ar.unique'   => __('general.This Field Already Exists'),
            'name_ar.string'    => __('general.Format Not Matching'),

            'name_en.required' => __('general.Field Is Required'),
            'name_en.unique'   => __('general.This Field Already Exists'),
            'name_en.string'    => __('general.Format Not Matching'),
        ]);

        if ($valid->fails()) {
            return back()->withErrors($valid)->withInput($req->all());
        }

        UnitMdl::create([
            'name_en' => $req->name_en,
            'name_ar' => $req->name_ar,
        ]);

        Alert()->success(__('general.Record Added Successfully'));

        return redirect()->route('unit.index');
    }
    /**
     * ============================
     * ============================
     */
    public function edit(UnitMdl $unit)
    {
        $unit::find($unit);

        return view('units.edit', compact('unit'));
    }
    /**
     * ============================
     * ============================
     */
    public function update(Request $req)
    {
        $valid = Validator::make($req->all(), [
            'unit_id'    => 'required|integer|exists:units,id',
            'name_ar' => 'required|unique:units,name_ar,' . $req->unit_id . '|string',
            'name_en' => 'required|unique:units,name_en,' . $req->unit_id . '|string',
        ], [
            'unit_id.required' => __('general.Cant complete Your Request Now'),
            'unit_id.integer'  => __('general.Cant complete Your Request Now'),
            'unit_id.exists'    => __('general.Cant complete Your Request Now'),

            'name_ar.required' => __('general.Field Is Required'),
            'name_ar.unique'   => __('general.This Field Already Exists'),
            'name_ar.string'    => __('general.Format Not Matching'),

            'name_en.required' => __('general.Field Is Required'),
            'name_en.unique'   => __('general.This Field Already Exists'),
            'name_en.string'    => __('general.Format Not Matching'),
        ]);

        if ($valid->fails()) {
            return back()->withErrors($valid)->withInput($req->all());
        }

        $unit = UnitMdl::findOrFail($req->unit_id);

        $unit->name_en = $req->name_en;
        $unit->name_ar = $req->name_ar;
        $unit->save();

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
            'unitID' => 'required|integer|exists:units,id',
        ]);

        if ($valid->fails()) {
            Alert()->error(__('general.Cant complete Your Request Now'));
            return back();
        }

        $unit = UnitMdl::findOrFail($req->unitID);

        $unit->status = 1;
        $unit->save();

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
            'unitID' => 'required|integer|exists:units,id',
        ]);

        if ($valid->fails()) {
            Alert()->error(__('general.Cant complete Your Request Now'));
            return back();
        }

        $unit = UnitMdl::findOrFail($req->unitID);

        $unit->status = 0;
        $unit->save();

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
            'unitID' => 'required|integer|exists:units,id',
        ]);

        if ($valid->fails()) {
            Alert()->error(__('general.Cant complete Your Request Now'));
            return back();
        }

        $unit = UnitMdl::findOrFail($req->unitID);

        $unit->delete();

        Alert()->success(__('general.Record Deleted Successfully'));
        return back();
    }
    /**
     * ============================
     * ============================
     */
}
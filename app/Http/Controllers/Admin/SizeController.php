<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SizeMdl;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SizeController extends Controller
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
        $units = SizeMdl::paginate(pageCount);

        $unitsCount = SizeMdl::count();

        $list_title = __('general.All');

        return view('sizes.index', compact('units', 'unitsCount', 'list_title'));
    }
    /**
     * ============================
     * ============================
     */
    public function create()
    {
        return view('sizes.create');
    }
    /**
     * ============================
     * ============================
     */
    public function store(Request $req)
    {
        $valid = Validator::make($req->all(), [
            'name' => 'required|string',
            'width' => 'required|numeric',
            'height' => 'required|numeric',
        ], [
            'name.required' => __('general.Field Is Required'),
            'name.required' => __('general.Format Not Matching'),

            'width.required' => __('general.Field Is Required'),
            'width.required' => __('general.Format Not Matching'),

            'height.required' => __('general.Field Is Required'),
            'height.required' => __('general.Format Not Matching'),
        ]);

        if ($valid->fails()) {
            return back()->withErrors($valid)->withInput($req->all());
        }

        SizeMdl::create([
            'title'    => $req->name,
            'width' => $req->width,
            'height' => $req->height,
        ]);

        Alert()->success(__('general.Record Added Successfully'));
        return redirect()->route('size.index');
    }
    /**
     * ============================
     * ============================
     */
    public function edit(SizeMdl $size)
    {
        $size::find($size);

        return view('sizes.edit', compact('size'));
    }
    /**
     * ============================
     * ============================
     */
    public function update(Request $req)
    {
        $valid = Validator::make($req->all(), [
            'size_id' => 'required|integer|exists:sizes,id',
            'name' => 'required|string',
            'width' => 'required|numeric',
            'height' => 'required|numeric',
        ], [
            'size_id.required' => __('general.Cant complete Your Request Now'),
            'size_id.integer'  => __('general.Cant complete Your Request Now'),
            'size_id.exists'    => __('general.Cant complete Your Request Now'),

            'name.required' => __('general.Field Is Required'),
            'name.required' => __('general.Format Not Matching'),

            'width.required' => __('general.Field Is Required'),
            'width.required' => __('general.Format Not Matching'),

            'height.required' => __('general.Field Is Required'),
            'height.required' => __('general.Format Not Matching'),
        ]);

        if ($valid->fails()) {
            return back()->withErrors($valid)->withInput($req->all());
        }

        $unit = SizeMdl::findOrFail($req->size_id);

        $unit->title = $req->name;
        $unit->width = $req->width;
        $unit->height = $req->height;
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
            'unitID' => 'required|integer|exists:sizes,id',
        ]);

        if ($valid->fails()) {
            Alert()->error(__('general.Cant complete Your Request Now'));
            return back();
        }

        $unit = SizeMdl::findOrFail($req->unitID);

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
            'unitID' => 'required|integer|exists:sizes,id',
        ]);

        if ($valid->fails()) {
            Alert()->error(__('general.Cant complete Your Request Now'));
            return back();
        }

        $unit = SizeMdl::findOrFail($req->unitID);

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
            'unitID' => 'required|integer|exists:sizes,id',
        ]);

        if ($valid->fails()) {
            Alert()->error(__('general.Cant complete Your Request Now'));
            return back();
        }

        $unit = SizeMdl::findOrFail($req->unitID);

        $unit->delete();

        Alert()->success(__('general.Record Deleted Successfully'));
        return back();
    }
    /**
     * ============================
     * ============================
     */
}

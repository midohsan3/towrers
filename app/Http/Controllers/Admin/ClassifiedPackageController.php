<?php

namespace App\Http\Controllers\Admin;

use App\Models\SizeMdl;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;
use App\Models\ClassifiedPackageMdl;
use Illuminate\Support\Facades\Validator;

class ClassifiedPackageController extends Controller
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
            $packages = ClassifiedPackageMdl::orderBy('name_ar', 'ASC')->paginate(pageCount);
        } else {
            $packages = ClassifiedPackageMdl::orderBy('name_en', 'ASC')->paginate(pageCount);
        }

        $packagesCount = ClassifiedPackageMdl::count();

        $list_title = __('general.All');

        return view('classifiedsPackages.index', compact('packages', 'packagesCount', 'list_title'));
    }
    /**
     * ============================
     * ============================
     */
    public function create()
    {
        $sizes = SizeMdl::where('status', 1)->get();
        return view('classifiedsPackages.create', compact('sizes'));
    }
    /**
     * ============================
     * ============================
     */
    public function store(Request $req)
    {
        $valid = Validator::make($req->all(), [
            'name_ar' => 'required|unique:packages,name_ar|string|min:3',
            'name_en' => 'required|unique:packages,name_en|string|min:3',
            'position'      => 'required|string',
            'size'           => 'required|integer|exists:sizes,id',
            'period'      => 'required|numeric|gt:-1',
            'price'        => 'required|numeric|gt:-0.99',
        ], [
            'name_ar.required' => __('general.Field Is Required'),
            'name_ar.unique'   => __('general.This Field Already Exists'),
            'name_ar.string'    => __('general.Format Not Matching'),
            'name_ar.min'      => __('general.Text Too Short'),
            'name_ar.regex'    => __('general.Accepted Arabic Only'),

            'name_en.required' => __('general.Field Is Required'),
            'name_en.unique'   => __('general.This Field Already Exists'),
            'name_en.string'    => __('general.Format Not Matching'),
            'name_en.min'      => __('general.Text Too Short'),
            'name_en.regex'    => __('general.Accepted English Only'),

            'size.required' => __('general.Field Is Required'),
            'size.integer'  => __('general.Format Not Matching'),
            'size.exists'    => __('general.This Filed Dosnt Exist'),

            'position.required' => __('general.Field Is Required'),
            'position.string'    => __('general.Format Not Matching'),

            'period.required' => __('general.Field Is Required'),
            'period.numeric' => __('general.Format Not Matching'),
            'period.gt'        => __('general.Value Not Accepted'),

            'price.required' => __('general.Field Is Required'),
            'price.numeric' => __('general.Format Not Matching'),
            'price.gt'        => __('general.Value Not Accepted'),
        ]);

        if ($valid->fails()) {
            return back()->withErrors($valid)->withInput($req->all());
        }

        ClassifiedPackageMdl::create([
            'size_id'    => $req->size,
            'name_en' => $req->name_en,
            'name_ar' => $req->name_ar,
            'position' => $req->position,
            'period'   => $req->period,
            'price'     => $req->price,
        ]);

        Alert()->success(__('general.Record Added Successfully'));
        return redirect()->route('package.classified.index');
    }
    /**
     * ============================
     * ============================
     */
    public function edit($package)
    {
        $package = ClassifiedPackageMdl::find($package);

        $sizes = SizeMdl::where('status', 1)->get();

        return view('classifiedsPackages.edit', compact('package', 'sizes'));
    }
    /**
     * ============================
     * ============================
     */
    public function update(Request $req)
    {
        $valid = Validator::make($req->all(), [
            'package_id' => 'required|integer|exists:classifieds_packages,id',
            'name_ar' => 'required|unique:packages,name_ar,' . $req->package_id . '|string|min:3',
            'name_en' => 'required|unique:packages,name_en,' . $req->package_id . '|string|min:3',
            'size'           => 'required|integer|exists:sizes,id',
            'position'      => 'required|string',
            'period'      => 'required|numeric|gt:-1',
            'price'        => 'required|numeric|gt:-0.99',
        ], [
            'package_id.required' => __('general.Cant complete Your Request Now'),
            'package_id.integer'  => __('general.Cant complete Your Request Now'),
            'package_id.exists'    => __('general.Cant complete Your Request Now'),

            'name_ar.required' => __('general.Field Is Required'),
            'name_ar.unique'   => __('general.This Field Already Exists'),
            'name_ar.string'    => __('general.Format Not Matching'),
            'name_ar.min'      => __('general.Text Too Short'),

            'name_en.required' => __('general.Field Is Required'),
            'name_en.unique'   => __('general.This Field Already Exists'),
            'name_en.string'    => __('general.Format Not Matching'),
            'name_en.min'      => __('general.Text Too Short'),

            'size.required' => __('general.Field Is Required'),
            'size.integer'  => __('general.Format Not Matching'),
            'size.exists'    => __('general.This Filed Dosnt Exist'),

            'position.required' => __('general.Field Is Required'),
            'position.string'    => __('general.Format Not Matching'),

            'period.required' => __('general.Field Is Required'),
            'period.numeric' => __('general.Format Not Matching'),
            'period.gt'        => __('general.Value Not Accepted'),

            'price.required' => __('general.Field Is Required'),
            'price.numeric' => __('general.Format Not Matching'),
            'price.gt'        => __('general.Value Not Accepted'),
        ]);

        if ($valid->fails()) {
            return back()->withErrors($valid)->withInput($req->all());
        }

        $package = ClassifiedPackageMdl::findOrFail($req->package_id);

        $package->size_id    = $req->size;
        $package->name_en = $req->name_en;
        $package->name_ar = $req->name_ar;
        $package->position  = $req->position;
        $package->period   = $req->period;
        $package->price     = $req->price;
        $package->save();

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
            'packageID' => 'required|integer|exists:classifieds_packages,id',
        ]);

        if ($valid->fails()) {
            Alert()->error(__('general.Cant complete Your Request Now'));
            return back();
        }

        $package = ClassifiedPackageMdl::findOrFail($req->packageID);

        $package->status = 1;
        $package->save();

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
            'packageID' => 'required|integer|exists:classifieds_packages,id',
        ]);

        if ($valid->fails()) {
            Alert()->error(__('general.Cant complete Your Request Now'));
            return back();
        }

        $package = ClassifiedPackageMdl::findOrFail($req->packageID);

        $package->status = 0;
        $package->save();

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
            'packageID' => 'required|integer|exists:classifieds_packages,id',
        ]);

        if ($valid->fails()) {
            Alert()->error(__('general.Cant complete Your Request Now'));
            return back();
        }

        $package = ClassifiedPackageMdl::findOrFail($req->packageID);

        $package->delete();

        Alert()->success(__('general.Record Deleted Successfully'));
        return back();
    }
    /**
     * ============================
     * ============================
     */
}

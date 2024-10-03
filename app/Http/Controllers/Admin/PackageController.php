<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;
use App\Models\PackageMdl;
use Illuminate\Support\Facades\Validator;

class PackageController extends Controller
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
            $packages = PackageMdl::orderBy('name_ar', 'ASC')->paginate(pageCount);
        } else {
            $packages = PackageMdl::orderBy('name_en', 'ASC')->paginate(pageCount);
        }

        $packagesCount = PackageMdl::count();

        $list_title = __('general.All');

        return view('package.index', compact('packages', 'packagesCount', 'list_title'));
    }
    /**
     * ============================
     * ============================
     */
    public function active()
    {
        if (App::getLocale() == 'ar') {
            $packages = PackageMdl::where('status', 1)->orderBy('name_ar', 'ASC')->paginate(pageCount);
        } else {
            $packages = PackageMdl::where('status', 1)->orderBy('name_en', 'ASC')->paginate(pageCount);
        }

        $packagesCount = PackageMdl::where('status', 1)->count();

        $list_title = __('general.Active');

        return view('package.index', compact('packages', 'packagesCount', 'list_title'));
    }
    /**
     * ============================
     * ============================
     */
    public function inactive()
    {
        if (App::getLocale() == 'ar') {
            $packages = PackageMdl::where('status', 0)->orderBy('name_ar', 'ASC')->paginate(pageCount);
        } else {
            $packages = PackageMdl::where('status', 0)->orderBy('name_en', 'ASC')->paginate(pageCount);
        }

        $packagesCount = PackageMdl::where('status', 0)->count();

        $list_title = __('general.Inactive');

        return view('package.index', compact('packages', 'packagesCount', 'list_title'));
    }
    /**
     * ============================
     * ============================
     */
    public function create()
    {
        return view('package.create');
    }
    /**
     * ============================
     * ============================
     */
    public function store(Request $req)
    {
        $valid = Validator::make($req->all(), [
            'name_ar' => 'required|unique:packages,name_ar|string|min:3|regex:/^[؀-ۿ\s]+$/',
            'name_en' => 'required|unique:packages,name_en|string|min:3|regex:/^[a-zA-Z\s]+$/',
            'period'      => 'required|numeric|gt:-1',
            'price'        => 'required|numeric|gt:-0.99',
            'feature_ar' => 'required|string',
            'feature_en' => 'required|string',
        ], [
            'name_ar.required' => __('geneal.Field Is Required'),
            'name_ar.unique'   => __('geneal.This Field Already Exists'),
            'name_ar.string'    => __('geneal.Format Not Matching'),
            'name_ar.min'      => __('geneal.Text Too Short'),
            'name_ar.regex'    => __('geneal.Accepted Arabic Only'),

            'name_en.required' => __('geneal.Field Is Required'),
            'name_en.unique'   => __('geneal.This Field Already Exists'),
            'name_en.string'    => __('geneal.Format Not Matching'),
            'name_en.min'      => __('geneal.Text Too Short'),
            'name_en.regex'    => __('geneal.Accepted English Only'),

            'period.required' => __('geneal.Field Is Required'),
            'period.numeric' => __('geneal.Format Not Matching'),
            'period.gt'        => __('geneal.Value Not Accepted'),

            'price.required' => __('geneal.Field Is Required'),
            'price.numeric' => __('geneal.Format Not Matching'),
            'price.gt'        => __('geneal.Value Not Accepted'),

            'feature_ar.required' => __('geneal.Field Is Required'),
            'feature_ar.string'    => __('geneal.Format Not Matching'),

            'feature_en.required' => __('geneal.Field Is Required'),
            'feature_en.string'    => __('geneal.Format Not Matching'),
        ]);

        if ($valid->fails()) {
            return back()->withErrors($valid)->withInput($req->all());
        }

        PackageMdl::create([
            'name_en'    => $req->name_en,
            'name_ar'    => $req->name_ar,
            'period'       => $req->period,
            'price'         => $req->price,
            'features_en' => $req->feature_en,
            'features_ar' => $req->feature_ar,
        ]);

        Alert()->success(__('general.Record Added Successfully'));
        return redirect()->route('package.index');
    }
    /**
     * ============================
     * ============================
     */
    public function show(PackageMdl $package)
    {
        $package::find($package);

        return view('package.show', compact('package'));
    }
    /**
     * ============================
     * ============================
     */
    public function edit(PackageMdl $package)
    {
        $package::find($package);

        return view('package.edit', compact('package'));
    }
    /**
     * ============================
     * ============================
     */
    public function update(Request $req)
    {
        $valid = Validator::make($req->all(), [
            'package_id' => 'required|integer|exists:packages,id',
            'name_ar' => 'required|unique:packages,name_ar,' . $req->package_id . '|string|min:3|regex:/^[؀-ۿ\s]+$/',
            'name_en' => 'required|unique:packages,name_en,' . $req->package_id . '|string|min:3|regex:/^[a-zA-Z\s]+$/',
            'period'      => 'required|numeric|gt:-1',
            'price'        => 'required|numeric|gt:-0.99',
            'feature_ar' => 'required|string|',
            'feature_en' => 'required|string|',
        ], [
            'package_id.required' => __('general.Cant complete Your Request Now'),
            'package_id.integer'  => __('general.Cant complete Your Request Now'),
            'package_id.exists'   => __('general.Cant complete Your Request Now'),

            'name_ar.required' => __('geneal.Field Is Required'),
            'name_ar.unique'   => __('geneal.This Field Already Exists'),
            'name_ar.string'    => __('geneal.Format Not Matching'),
            'name_ar.min'      => __('geneal.Text Too Short'),
            'name_ar.regex'    => __('geneal.Accepted Arabic Only'),

            'name_en.required' => __('geneal.Field Is Required'),
            'name_en.unique'   => __('geneal.This Field Already Exists'),
            'name_en.string'    => __('geneal.Format Not Matching'),
            'name_en.min'      => __('geneal.Text Too Short'),
            'name_en.regex'    => __('geneal.Accepted English Only'),

            'period.required' => __('geneal.Field Is Required'),
            'period.numeric' => __('geneal.Format Not Matching'),
            'period.gt'        => __('geneal.Value Not Accepted'),

            'price.required' => __('geneal.Field Is Required'),
            'price.numeric' => __('geneal.Format Not Matching'),
            'price.gt'        => __('geneal.Value Not Accepted'),

            'feature_ar.required' => __('geneal.Field Is Required'),
            'feature_ar.string'    => __('geneal.Format Not Matching'),

            'feature_en.required' => __('geneal.Field Is Required'),
            'feature_en.string'    => __('geneal.Format Not Matching'),
        ]);

        if ($valid->fails()) {
            return back()->withErrors($valid)->withInput($req->all());
        }

        $package = PackageMdl::findOrFail($req->package_id);

        $package->name_en    = $req->name_en;
        $package->name_ar    = $req->name_ar;
        $package->period       = $req->period;
        $package->price         = $req->price;
        $package->features_en = $req->feature_en;
        $package->features_ar = $req->feature_ar;
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
            'packageID' => 'required|integer|exists:packages,id',
        ]);

        if ($valid->fails()) {
            Alert()->error(__('general.Cant complete Your Request Now'));
            return back();
        }

        $package = PackageMdl::findOrFail($req->packageID);

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
            'packageID' => 'required|integer|exists:packages,id',
        ]);

        if ($valid->fails()) {
            Alert()->error(__('general.Cant complete Your Request Now'));
            return back();
        }

        $package = PackageMdl::findOrFail($req->packageID);

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
            'packageID' => 'required|integer|exists:packages,id',
        ]);

        if ($valid->fails()) {
            Alert()->error(__('general.Cant complete Your Request Now'));
            return back();
        }

        $package = PackageMdl::findOrFail($req->packageID);

        $package->delete();

        Alert()->success(__('general.Record Deleted Successfully'));
        return back();
    }
    /**
     * ============================
     * ============================
     */
}

<?php

namespace App\Http\Controllers\Admin;

use alert;
use App\Models\CityMdl;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class CityController extends Controller
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

        $cities = CityMdl::orderBy('id', 'ASC')->paginate(pageCount);

        $citiesCount = CityMdl::count();

        $list_title = __('general.All');

        return view('city.index', compact('cities', 'citiesCount', 'list_title'));
    }
    /**
     * ============================
     * ============================
     */
    public function active()
    {
        if (App::getLocale() == 'ar') {
            $cities = CityMdl::where('status', 1)->orderBy('name_ar', 'ASC')->paginate(pageCount);
        } else {
            $cities = CityMdl::where('status', 1)->orderBy('name_en', 'ASC')->paginate(pageCount);
        }
        $citiesCount = CityMdl::where('status', 1)->count();

        $list_title = __('general.Active');

        return view('city.index', compact('cities', 'citiesCount', 'list_title'));
    }
    /**
     * ============================
     * ============================
     */
    public function inactive()
    {
        if (App::getLocale() == 'ar') {
            $cities = CityMdl::where('status', 0)->orderBy('name_ar', 'ASC')->paginate(pageCount);
        } else {
            $cities = CityMdl::where('status', 0)->orderBy('name_en', 'ASC')->paginate(pageCount);
        }
        $citiesCount = CityMdl::where('status', 0)->count();

        $list_title = __('general.Inactive');

        return view('city.index', compact('cities', 'citiesCount', 'list_title'));
    }
    /**
     * ============================
     * ============================
     */
    public function create()
    {
        return view('city.create');
    }
    /**
     * ============================
     * ============================
     */
    public function store(Request $req)
    {
        $valid = Validator::make($req->all(), [
            'name_ar' => 'required|unique:cities,name_ar|string|min:3|regex:/^[؀-ۿ\s]+$/',
            'name_en' => 'required|unique:cities,name_en|string|min:3|regex:/^[a-zA-Z\s]+$/',
        ], [
            'name_ar.required' => __('general.Field Is Required'),
            'name_ar.unique'   => __('general.This Field Already Exists'),
            'name_ar.string'    => __('general.Format Not Matching'),
            'name_ar.min'      => __('general.Text Too Short'),
            'name_ar.regex'    => __('general.Accepted Arabic Only'),

            'name_en.required' => __('general.Name Is Required'),
            'name_en.unique'   => __('general.This Field Already Exists'),
            'name_en.string'    => __('general.Format Not Matching'),
            'name_en.min'      => __('general.Text Too Short'),
            'name_en.regex'    => __('general.Accepted English Only'),
        ]);

        if ($valid->fails()) {
            return back()->withErrors($valid)->withInput($req->all());
        }

        $city = CityMdl::create([
            'name_en' => $req->name_en,
            'name_ar' => $req->name_ar,
        ]);

        Alert()->success(__('general.Record Added Successfully'));
        return redirect()->route('city.index');
    }
    /**
     * ============================
     * ============================
     */
    public function show(CityMdl $city)
    {
        $city::find($city);
        return view('city.show', compact('city'));
    }
    /**
     * ============================
     * ============================
     */
    public function edit(CityMdl $city)
    {
        $city::find($city);
        return view('city.edit', compact('city'));
    }
    /**
     * ============================
     * ============================
     */
    public function update(Request $req)
    {
        $valid = Validator::make($req->all(), [
            'city_id' => 'required|integer|exists:cities,id',
            'name_ar' => 'required|unique:cities,name_ar,' . $req->city_id . '|string|min:3|regex:/^[؀-ۿ\s]+$/',
            'name_en' => 'required|unique:cities,name_en,' . $req->city_id . '|string|min:3|regex:/^[a-zA-Z\s]+$/',
        ], [
            'city_id.required' => __('general.Field Is Required'),
            'city_id.integer'  => __('general.Format Not Matching'),
            'city_id.exists'    => __('general.This Filed Dosnt Exist'),

            'name_ar.required' => __('general.Field Is Required'),
            'name_ar.unique'   => __('general.This Field Already Exists'),
            'name_ar.string'    => __('general.Format Not Matching'),
            'name_ar.min'      => __('general.Text Too Short'),
            'name_ar.regex'    => __('general.Accepted Arabic Only'),

            'name_en.required' => __('general.Name Is Required'),
            'name_en.unique'   => __('general.This Field Already Exists'),
            'name_en.string'    => __('general.Format Not Matching'),
            'name_en.min'      => __('general.Text Too Short'),
            'name_en.regex'    => __('general.Accepted English Only'),
        ]);

        if ($valid->fails()) {
            return back()->withErrors($valid)->withInput($req->all());
        }

        $city = CityMdl::findOrFail($req->city_id);

        $city->name_en = $req->name_en;
        $city->name_ar = $req->name_ar;
        $city->save();

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
            'cityID' => 'required|integer|exists:cities,id',
        ]);

        if ($valid->fails()) {
            Alert()->error(__('general.Cant complete Your Request Now'));
            return back();
        }

        $city = CityMdl::findOrFail($req->cityID);

        $city->status = 1;
        $city->save();

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
            'cityID' => 'required|integer|exists:cities,id',
        ]);

        if ($valid->fails()) {
            Alert()->error(__('general.Cant complete Your Request Now'));
            return back();
        }

        $city = CityMdl::findOrFail($req->cityID);

        $city->status = 0;
        $city->save();

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
            'cityID' => 'required|integer|exists:cities,id',
        ]);

        if ($valid->fails()) {
            Alert()->error(__('general.Cant complete Your Request Now'));
            return back();
        }

        $city = CityMdl::findOrFail($req->cityID);
        $city->delete();

        Alert()->success(__('general.Record Deleted Successfully'));
        return back();
    }
    /**
     * ============================
     * ============================
     */
}
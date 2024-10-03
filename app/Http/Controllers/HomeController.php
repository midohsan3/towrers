<?php

namespace App\Http\Controllers;

use App\Models\CvMdl;
use App\Models\CompanyMdl;
use Illuminate\Http\Request;
use App\Models\JobCategoryMdl;
use App\Models\CompanyMajorMdl;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use function PHPUnit\Framework\isNull;

class HomeController extends Controller
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
    public function index()
    {
        if (Auth::user()->role_name == 'Company') {
            if (Auth::user()->profile_pic == null) {
                return redirect()->route('c-company.profile.create.logo');
            }

            $company = CompanyMdl::where('user_id', Auth::user()->id)->first();

            if ($company->package_id == null) {
                return redirect()->route('c-company.package.index');
            }

            if ($company->section_id == null) {
                return redirect()->route('c-company.section.index');
            }

            if ($company->city_id == null || $company->address == null) {
                return redirect()->route('c-company.profile.create.address');
            }

            $majors = CompanyMajorMdl::where('company_id', $company->id)->count();

            if ($majors == 0) {
                return redirect()->route('c-company.majors.index');
            }

            return redirect()->route('c-company.dashboard.index');
        } elseif (Auth::user()->role_name == 'Person') {
            if (Auth::user()->phone == null) {
                return view('personProfile.phone');
            }

            return view('dashboards.person');
        }
        //return view('home');
        return redirect()->route('admin_dashboard.index');
    }
}

<?php

namespace App\Http\Controllers\Company;

use App\Models\JobMdl;
use App\Models\OrderMdl;
use App\Models\ProductMdl;
use App\Models\ProjectMdl;
use Illuminate\Http\Request;
use App\Models\CompanyProjectMdl;
use App\Http\Controllers\Controller;
use App\Models\ClassifiedMdl;
use Illuminate\Support\Facades\Auth;

class CDashboardController extends Controller
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
        $projects = CompanyProjectMdl::where('company_id', Auth::user()->companyUser->id)->count();

        $products = ProductMdl::where('user_id', Auth::user()->id)->count();

        $jobs = JobMdl::where('user_id', Auth::user()->id)->count();

        $newEnquiry = OrderMdl::where([['user_id', Auth::user()->id], ['status', 1]])->count();

        $completedEnquiry = OrderMdl::where([['user_id', Auth::user()->id], ['status', 2]])->count();

        $rejectedEnquiry = OrderMdl::where([['user_id', Auth::user()->id], ['status', 3]])->count();

        $pendingClassifieds = ClassifiedMdl::where([['user_id', Auth::user()->id], ['status', 0]])->count();

        $activeClassifieds = ClassifiedMdl::where([['user_id', Auth::user()->id], ['status', 2]])->count();

        $inactiveClassifieds = ClassifiedMdl::where([['user_id', Auth::user()->id], ['status', 3]])->count();

        $rejectClassifieds = ClassifiedMdl::where([['user_id', Auth::user()->id], ['status', 4]])->count();

        $lastEnquiry = OrderMdl::where('user_id', Auth::user()->id)->where('status', '<>', 0)->orderBy('id', 'DESC')->limit(5)->get();

        return view('dashboards.company', compact('projects', 'products', 'jobs', 'newEnquiry', 'completedEnquiry', 'rejectedEnquiry', 'pendingClassifieds', 'activeClassifieds', 'inactiveClassifieds', 'rejectClassifieds', 'lastEnquiry'));
    }
    /**
     * ============================
     * ============================
     */
}

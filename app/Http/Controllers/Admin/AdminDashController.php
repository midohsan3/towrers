<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\OrderMdl;
use App\Models\ProductMdl;
use App\Models\ProjectMdl;
use Illuminate\Http\Request;
use App\Models\ClassifiedMdl;
use Illuminate\Support\Carbon;
use App\Models\SubscriptionMdl;
use App\Http\Controllers\Controller;
use App\Models\CvMdl;
use App\Models\JobMdl;

class AdminDashController extends Controller
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
        $users = User::where('status', 1)->count();

        $admins = User::where('status', 1)->whereIn('role_name', ['Owner', 'Admin'])->count();

        $companies = User::where('status', 1)->where('role_name', 'Company')->count();

        $persons = User::where('status', 1)->where('role_name', 'Person')->count();

        $subscriptions = SubscriptionMdl::where('status', 1)->count();

        $subscriptions_end_soon = SubscriptionMdl::where('status', 1)->whereDate('ended_at', '<=', Carbon::now()->subWeekdays(7))->count();

        $classifieds = ClassifiedMdl::count();

        $active_classifieds = ClassifiedMdl::where('status', 1)->count();

        $new_classifieds = ClassifiedMdl::where('status', 0)->count();

        $orders = OrderMdl::whereNot('status', 3)->count();

        $new_orders = OrderMdl::where('status', 0)->count();

        $approve_orders = OrderMdl::where('status', 1)->count();

        $complete_orders = OrderMdl::where('status', 2)->count();

        $projects = ProjectMdl::where('status', 1)->count();

        $products = ProductMdl::count();

        $jobs = JobMdl::where('status', 1)->count();

        $cvs = CvMdl::where('status', 1)->count();

        $lastEnquiry = [];
        return view('dashboards.admin', compact('users', 'admins', 'companies', 'classifieds', 'persons', 'subscriptions', 'subscriptions_end_soon', 'active_classifieds', 'new_classifieds', 'orders', 'new_orders', 'approve_orders', 'complete_orders', 'projects', 'products', 'jobs', 'cvs', 'lastEnquiry'));
    }
    /**
     * ============================
     * ============================
     */
}

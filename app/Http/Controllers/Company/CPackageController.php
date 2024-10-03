<?php

namespace App\Http\Controllers\Company;

use App\Models\PackageMdl;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\SubscriptionMdl;
use App\Http\Controllers\Controller;
use App\Models\CompanyMdl;
use Illuminate\Support\Facades\Auth;

class CPackageController extends Controller
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
        $packages = PackageMdl::where([['status', 1], ['price', 0]])->orderBy('price', 'ASC')->get();

        $subscription = SubscriptionMdl::where([['status', 1], ['user_id', Auth::user()->id]])->whereDate('ended_at', '>', now())->get()->pluck('id', 'package_id')->all();

        return view('companyPackage.choose', compact('packages', 'subscription'));
    }
    /**
     * ============================
     * ============================
     */
    public function storeFree($package)
    {
        $package = PackageMdl::find($package);

        $old_subscriptions = SubscriptionMdl::where('user_id', Auth::user()->id)->get();

        foreach ($old_subscriptions as $old_subscription) {
            $old_subscription->ended_at = Carbon::now();
            $old_subscription->status = 0;
            $old_subscription->save();
        }

        if ($package->period == 0) {
            $endDt = Carbon::now()->addYears(5);
        } else {
            $endDt = Carbon::now()->addDays($package->period);
        }

        $subscription = SubscriptionMdl::create([
            'user_id' => Auth::user()->id,
            'package_id' => $package->id,
            'started_at' => Carbon::now(),
            'ended_at' => $endDt,
        ]);

        $subscription->status = 1;
        $subscription->save();

        $company = CompanyMdl::where('user_id', Auth::user()->id)->first();

        $company->package_id = $package->id;
        $company->save();

        Alert()->Success(__('package.You Subscribed Successfully'));

        return redirect()->route('home');
    }
    /**
     * ============================
     * ============================
     */
    public function check($package)
    {
        $package = PackageMdl::find($package);

        return view('companyPackage.checkPayment', compact('package'));
    }
    /**
     * ============================
     * ============================
     */
    public function storeSubscribe($package)
    {
        $package = PackageMdl::find($package);

        $old_subscriptions = SubscriptionMdl::where('user_id', Auth::user()->id)->get();

        foreach ($old_subscriptions as $old_subscription) {
            $old_subscription->ended_at = Carbon::now();
            $old_subscription->status = 0;
            $old_subscription->save();
        }

        if ($package->period == 0) {
            $endDt = Carbon::now()->addYears(5);
        } else {
            $endDt = Carbon::now()->addDays($package->period);
        }

        $subscription = SubscriptionMdl::create([
            'user_id' => Auth::user()->id,
            'package_id' => $package->id,
            'started_at' => Carbon::now(),
            'ended_at' => $endDt,
            'paid_amount' => $package->price,
        ]);

        $subscription->status = 1;
        $subscription->save();

        $company = CompanyMdl::where('user_id', Auth::user()->id)->first();

        $company->package_id = $package->id;
        $company->save();

        Alert()->Success(__('package.You Subscribed Successfully'));

        return redirect()->route('home');
    }
    /**
     * ============================
     * ============================
     */
}

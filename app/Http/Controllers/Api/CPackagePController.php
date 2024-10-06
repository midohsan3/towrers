<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Models\CompanyMdl;
use App\Models\PackageMdl;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\SubscriptionMdl;
use App\Http\Controllers\Controller;

class CPackagePController extends Controller
{
    /*
    ===================
    =Index
    ===================
    */
    public function index($user_id){
        $packages = PackageMdl::where([['status', 1], ['price', 0]])->orderBy('price', 'ASC')->get();

        /*
        if(empty($packages)){
            return json_encode(array('status' => 'Empty packages'));

        }else{
            $data['packages'] = $packages;
        }
        */
        $data['packages'] = $packages;

        $subscription = SubscriptionMdl::where([['status', 1], ['user_id', $user_id]])->whereDate('ended_at',
        '>', now())->get()->pluck('id', 'package_id')->all();

        /*
        if(empty($subscription)){
            return json_encode(array('status' => 'Empty subscription'));
        }else{
            $data['subscription'] = $subscription;
        }
*/
        $data['subscription'] = $subscription;


        return json_encode(array('status' => 'success','data'=>$data));
    }
    /*
    ===================
    = SUBSCRIBE
    ===================
    */
    public function subscribe($package_id, $user_id){

        $user = User::findOrFail($user_id);

        if(empty($user)){
            return json_encode(array('status' => 'Fail user'));
        }

        $package = PackageMdl::findOrFail($package_id);

        if(empty($package)){
            return json_encode(array('status' => 'Fail package'));
        }

        $old_subscriptions = SubscriptionMdl::where('user_id', $user->id)->get();

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
            'user_id' => $user->id,
            'package_id' => $package->id,
            'started_at' => Carbon::now(),
            'ended_at' => $endDt,
        ]);

        $subscription->status = 1;
        $subscription->save();

        $company = CompanyMdl::where('user_id', $user->id)->first();

         $company->package_id = $package->id;
         $company->save();

         return json_encode(array('status' => 'Success'));
    }
    /*
    ===================
    =
    ===================
    */
}
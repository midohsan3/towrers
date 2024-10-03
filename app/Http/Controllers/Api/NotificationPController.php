<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class NotificationPController extends Controller
{
    /**
    * ============================
    * INDEX
    * ============================
    */
    public function index($user_id){

        $user = User::findOrFail($user_id);

        if(empty($user)){
            return json_encode(array('status' => 'user fail'));
        }

        $notifications = DB::table('notifications')->where('notifiable_id',$user->id)->where('read_at',null)->get();
        

        if(empty($notifications)){
            return json_encode(array('status' => 'empty'));
        }elseif($notifications->count()>0){
            return json_encode(array('status' => 'success', 'data' => $notifications));
        }else{
            return json_encode(array('status'=>'fail'));
        }
    }
    /**
    * ============================
    * 
    * ============================
    */
}
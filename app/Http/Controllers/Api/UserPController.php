<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserPController extends Controller
{
    /**
    * ============================
    * PROFILE UPDATE
    * ============================
    */
    public function profile(Request $req){
      $valid = Validator::make($req->all(),[
        'user_id'=>'required|numeric|exists:users,id',
        'phone'  =>'required',
      ]);

      if($valid->fails()){
         return json_encode(array('status' => 'fail'));
      }

      $user = User::findOrFail($req->user_id);

      if(empty($user)){
        return json_encode(array('status' => 'user fail'));
      }

      $user->phone = $req->phone;
      $user->save();

      return json_encode(array('status' => 'success'));
    }
    /**
    * ============================
    *
    * ============================
    */
    public function restPassword(Request $req){
        $valid = Validator::make($req->all(), [
        'user_id' => 'required|numeric|exists:users,id',
        'oldPassword' => 'required',
        'password' => 'required',
        ]);

        if ($valid->fails()) {
        return json_encode(array('status' => 'fail'));
        }

        $user = User::findOrFail($req->user_id);

        if(empty($user)){
            return json_encode(array('status' => 'user fail'));
        }

        if (Hash::check($req->oldPassword, $user->password)) {
            $profile = User::find(Auth::user()->id);
            $profile->password = Hash::make($req->password);
            $profile->save();

            return json_encode(array('status' => 'success'));
        }else{
            return json_encode(array('status' => 'password not matching'));
        }
    }
    /**
    * ============================
    *
    * ============================
    */
}
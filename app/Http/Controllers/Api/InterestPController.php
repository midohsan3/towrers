<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Models\InterestMdl;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class InterestPController extends Controller
{
    /**
    * ============================
    * INDEX
    * ============================
    */

    public function index(){
        $interests = InterestMdl::where([['name_en','!=','General'],['status',1]])->get();

        if(empty($interests)){
            return json_encode(array('status' => 'empty'));

        }elseif($interests->count() > 0){

            return json_encode(array('status' => 'success', 'data' => $interests));

        } else {
            return json_encode(array('status' => 'fail'));
        }

    }

    /**
    * ============================
    *
    * ============================
    */
    public function update(Request $req){
        $valid = Validator::make($req->all(),[
        'user'    =>'required|numeric|exists:users,id',
        'interest'=>'required',
    ]);

    if($valid->fails()){
        return back()->withErrors($valid)->withInput($req->all());
    }

    $user = User::findOrFail($req->user);

    if(empty($user)){
        return json_encode(array('status' => 'user fail'));
    }

    $user->interest_has_user()->sync($req->interest);

    return json_encode(array('status'=>'success'));

    
    }
    /**
    * ============================
    *
    * ============================
    */
}
<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Models\MajorMdl;
use App\Models\CompanyMdl;
use App\Models\SectionMdl;
use Illuminate\Http\Request;
use App\Models\CompanyMajorMdl;
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
    * CHOOSE GRADE
    * ============================
    */
    public function grade($user_id){

        $user = User::findOrFail($user_id);

        if(empty($user)){
             return json_encode(array('status' => 'user null'));
        }

        $company = CompanyMdl::where('user_id',$user->id)->first();

        if(empty($company)){
             return json_encode(array('status' => 'user not company'));
        }

        $categories = SectionMdl::where('status',1)->get();

        if (empty($categories)) {
            return json_encode(array('status' => 'empty'));

        }elseif($categories->count() > 0){

            return json_encode(array('status' => 'success', 'data' => $categories));

        } else {
            return json_encode(array('status' => 'fail'));
        }

    }
    /**
    * ============================
    *STORE GRADE
    * ============================
    */
    public function sectionStore(Request $req){
        $valid = Validator::make($req->all(),[
            'user_id'=>'required|numeric|exists:users,id',
            'grade'  =>'required|numeric|exists:sections,id',
        ]);

        if($valid->fails()){
            return json_encode(array('status' => 'fail validation'));
        }

        $company = CompanyMdl::where('user_id',$req->user_id)->first();

        if(empty($company)){
            return json_encode(array('status' => 'company null'));
        }

        $company->section_id = $req->section_id;
        $company->save();

        return json_encode(array('status'=>'success'));
    }
    /**
    * ============================
    * MAJOR
    * ============================
    */
    public function major($user_id){
        
        $user = User::findOrFail($user_id);

        if(empty($user)){
            return json_encode(array('status'=>'user fail'));
        }

        if($user->companyUser->section_id == null){
            return json_encode(array('status'=>'company dont have section'));
        }

        $data['majors'] = $majors = MajorMdl::where('section_id', $user->companyUser->section_id)->get();

       $data['companyMajors'] = CompanyMajorMdl::where('company_id',
        $user->companyUser->id)->get()->pluck('major_id')->all();

        return json_encode(array('status'=>'success','data'=>$data));
    }
    /**
    * ============================
    *
    * ============================
    */
    public function majorStore(Request $req){
        $valid = Validator::make($req->all(),[
            'user_id'=>'required|numeric|exists:users,id',
            'major_id'=>'required|numeric'
        ]);

        if($valid->fails()){
            return json_encode(array('status'=>'validation fail'));
        }

        $company = CompanyMdl::where('user_id', $req->user_id)->first();

        if(empty($company)){
            return json_encode(array('status'=>'company null'));
        }

        $company->company_has_major()->sync($req->major);

        return json_encode(array('status'=>'success'));
    }
    /**
    * ============================
    *
    * ============================
    */
}
<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Models\CompanyMdl;
use Illuminate\Http\Request;
use App\Models\CommunicationMdl;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    public function company(Request $req){
        $valid = Validator::make($req->all(), [
            'name'         => 'required|string|min:3',
            'position'     => 'required|string|min:2',
            'company_name' => 'required|string|min:3',
            'phone'        => 'required|numeric',
            'email'        => 'required|email|unique:users,email',
            'oEmail'       => 'required|email',
            'password'     => 'required|confirmed|min:4',
        ], [
            'name.required' => __('general.Field Is Required'),
            'name.string' => __('general.Format Not Matching'),
            'name.min' => __('general.Text Too Short'),

            'position.required' => __('general.Field Is Required'),
            'position.string' => __('general.Format Not Matching'),
            'position.min' => __('general.Text Too Short'),

            'company_name.required' => __('general.Field Is Required'),
            'company_name.string' => __('general.Format Not Matching'),
            'company_name.min' => __('general.Text Too Short'),

            'phone.required' => __('general.Field Is Required'),
            'phone.numeric' => __('general.Format Not Matching'),

            'email.required' => __('general.Field Is Required'),
            'email.email' => __('general.Format Not Matching'),
            'email.unique' => __('general.This Field Already Exists'),

            'oEmail.required' => __('general.Field Is Required'),
            'oEmail.email' => __('general.Format Not Matching'),

            'password.required' => __('general.Field Is Required'),
            'password.confirmed' => __('front.Password Not Confirmed'),
            'password.unique' => __('general.Text Too Short'),
        ]);

        if ($valid->fails()) {
            return back()->withErrors($valid)->withInput($req->all());
        }

        $user = User::create([
            'name' => $req->name,
            'email' => $req->email,
            'role_name' => 'Company',
            'password' => Hash::make($req->password),
        ]);

        if (empty($user)) {
            return json_encode(array('status' => 'empty user'));
        }

        $user->assignRole('Company');

        $company = CompanyMdl::create([
            'user_id' => $user->id,
            'name_en' => $req->company_name,
            'name_ar' => $req->company_name,
            'responsible_name' => $req->name,
            'position' => $req->position,
            'register_by' => 1,
        ]);

        if(empty($company)){
            return json_encode(array('status' => 'empty Company'));
        }

        $communication = CommunicationMdl::create([
            'user_id' => $user->id,
            'con_type' => 1,
            'chanel' => $req->phone,
        ]);

        if(empty($communication)){
            return json_encode(array('status' => 'empty Communication'));
        }

        $connection = CommunicationMdl::create([
            'user_id' => $user->id,
            'con_type' => 11,
            'chanel' => $req->oEmail,
        ]);

        if(empty($connection)){
            return json_encode(array('status' => 'empty Connection'));
        }

        return json_encode(array('status' => 'success'));
    }

    /*
    ===================
    ===================
    */
    public function person(Request $req){
        $valid = Validator::make($req->all(), [
        'name' => 'required|string|min:3',
        'phone' => 'required|numeric',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|confirmed|min:4',
        ], [
        'name.required' => __('general.Field Is Required'),
        'name.string' => __('general.Format Not Matching'),
        'name.min' => __('general.Text Too Short'),

        'phone.required' => __('general.Field Is Required'),
        'phone.numeric' => __('general.Format Not Matching'),

        'email.required' => __('general.Field Is Required'),
        'email.email' => __('general.Format Not Matching'),
        'email.unique' => __('general.This Field Already Exists'),

        'password.required' => __('general.Field Is Required'),
        'password.confirmed' => __('front.Password Not Confirmed'),
        'password.unique' => __('general.Text Too Short'),
        ]);

        if ($valid->fails()) {
            return back()->withErrors($valid)->withInput($req->all());
        }

        $user = User::create([
            'name' => $req->name,
            'email' => $req->email,
            'phone' => $req->phone,
            'role_name' => 'Person',
            'approval' => 1,
            'status' => 1,
            'password' => Hash::make($req->password),
        ]);

        if (empty($user)) {
            return json_encode(array('status' => 'empty user'));
        }

        $user->assignRole('Person');


        $communications = CommunicationMdl::create([
            'user_id' => $user->id,
            'con_type' => 1,
            'chanel' => $req->phone,
        ]);

        if (empty($communications)) {
            return json_encode(array('status' => 'empty Communication'));
        }

        $connection = CommunicationMdl::create([
            'user_id' => $user->id,
            'con_type' => 11,
            'chanel' => $req->email,
        ]);

        if (empty($connection)) {
            return json_encode(array('status' => 'empty Connection'));
        }

        return json_encode(array('status' => 'success'));
    }
    /*
    ===================
    ===================
    */
    public function logs(Request $req){
        $valid = Validator::make($req->all(), [
            'email'    => 'required|email',
            'password' => 'required',
        ], [
            'email.required'    => 'E-mail is Required.!',
            'email.email'       => 'It Should be E-mail Formate.!',
            'password.required' => 'PassWord is Required.!',
        ]);

        if ($valid->fails()) {
            return back()->withErrors($valid)->withInput($req->all());
        }

        if (Auth::attempt(['email' => $req->email, 'password' => $req->password])) {
            return json_encode(array('status' => 'success'));
        } else {
            return json_encode(array('status' => 'fail'));
        }
    }


}

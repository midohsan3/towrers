<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\CompanyMdl;
use Illuminate\Http\Request;
use App\Mail\CompanyRegister;
use App\Mail\OwnerCompanyRegister;
use App\Mail\OwnerPersonRegister;
use App\Mail\PersonRegister;
use App\Models\CommunicationMdl;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class TowersController extends Controller
{
    /**
     * ============================
     * ============================
     */
    public function companyRegister()
    {
        return view('logs.companies');
    }
    /**
     * ============================
     * ============================
     */
    public function personRegister()
    {
        return view('logs.personal');
    }
    /**
     * ============================
     * ============================
     */
    public function companyStore(Request $req)
    {
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
            'name.string'   => __('general.Format Not Matching'),
            'name.min'      => __('general.Text Too Short'),

            'position.required' => __('general.Field Is Required'),
            'position.string'   => __('general.Format Not Matching'),
            'position.min'      => __('general.Text Too Short'),

            'company_name.required' => __('general.Field Is Required'),
            'company_name.string'   => __('general.Format Not Matching'),
            'company_name.min'      => __('general.Text Too Short'),

            'phone.required' => __('general.Field Is Required'),
            'phone.numeric'  => __('general.Format Not Matching'),

            'email.required' => __('general.Field Is Required'),
            'email.email'    => __('general.Format Not Matching'),
            'email.unique'   => __('general.This Field Already Exists'),

            'oEmail.required' => __('general.Field Is Required'),
            'oEmail.email'    => __('general.Format Not Matching'),

            'password.required'  => __('general.Field Is Required'),
            'password.confirmed' => __('front.Password Not Confirmed'),
            'password.unique'    => __('general.Text Too Short'),
        ]);

        if ($valid->fails()) {
            return back()->withErrors($valid)->withInput($req->all());
        }

        $user = User::create([
            'name'      => $req->name,
            'email'     => $req->email,
            'phone'     => $req->phone,
            'role_name' => 'Company',
            'password'  => Hash::make($req->password),
        ]);

        $user->assignRole('Company');

        CompanyMdl::create([
            'user_id'            => $user->id,
            'name_en'            => $req->company_name,
            'name_ar'            => $req->company_name,
            'responsible_name'   => $req->name,
            'position'           => $req->position,
            'register_by'        => 1,
        ]);

        CommunicationMdl::create([
            'user_id'  => $user->id,
            'con_type' => 1,
            'chanel'   => $req->phone,
        ]);
        CommunicationMdl::create([
            'user_id'    => $user->id,
            'con_type'   => 11,
            'chanel'     => $req->oEmail,
        ]);

        $data = ['id' => $user->id, 'email' => $user->email, 'company_name' => $req->company_name, 'pass' => $req->password];

        // Mail::to($user->email)->send(new CompanyRegister($data));

        //Mail::to('info@towersuae.ae')->send(new OwnerCompanyRegister($data));
        return redirect()->route('home');
    }
    /**
     * ============================
     * ============================
     */
    public function personStore(Request $req)
    {
        $valid = Validator::make($req->all(), [
            'name'              => 'required|string|min:3',
            'phone'             => 'required|numeric',
            'email'             => 'required|email|unique:users,email',
            'oEmail'            => 'required|email',
            'password'          => 'required|confirmed|min:4',
        ], [
            'name.required' => __('general.Field Is Required'),
            'name.string'   => __('general.Format Not Matching'),
            'name.min'      => __('general.Text Too Short'),

            'phone.required' => __('general.Field Is Required'),
            'phone.numeric'  => __('general.Format Not Matching'),

            'email.required' => __('general.Field Is Required'),
            'email.email'    => __('general.Format Not Matching'),
            'email.unique'   => __('general.This Field Already Exists'),

            'oEmail.required' => __('general.Field Is Required'),
            'oEmail.email'    => __('general.Format Not Matching'),

            'password.required'  => __('general.Field Is Required'),
            'password.confirmed' => __('front.Password Not Confirmed'),
            'password.unique'    => __('general.Text Too Short'),
        ]);

        if ($valid->fails()) {
            return back()->withErrors($valid)->withInput($req->all());
        }

        $user = User::create([
            'name'      => $req->name,
            'email'     => $req->email,
            'phone'     => $req->phone,
            'role_name' => 'Person',
            'approval'  => 1,
            'status'    => 1,
            'password'  => Hash::make($req->password),
        ]);

        $user->assignRole('Person');


        CommunicationMdl::create([
            'user_id'    => $user->id,
            'con_type'   => 1,
            'chanel'     => $req->phone,
        ]);
        CommunicationMdl::create([
            'user_id'    => $user->id,
            'con_type'   => 11,
            'chanel'     => $req->oEmail,
        ]);

        $data = ['id' => $user->id, 'email' => $user->email, 'person' => $user->name, 'pass' => $req->password];

        // Mail::to($user->email)->send(new PersonRegister($data));

        //Mail::to('info@towersuae.ae')->send(new OwnerPersonRegister($data));

        return redirect()->route('home');
    }
    /**
     * ============================
     * ============================
     */
}
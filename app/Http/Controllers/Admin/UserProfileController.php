<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\CommunicationMdl;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserProfileController extends Controller
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
    public function personal()
    {
        $company_mail = CommunicationMdl::where([['user_id', Auth::user()->id], ['con_type', 11]])->first();
        return view('users.personal', compact('company_mail'));
    }
    /**
     * ============================
     * ============================
     */
    public function personalUpdate(Request $req)
    {
        $valid = Validator::make($req->all(), [
            'name' => 'required|string',
        ]);

        if ($valid->fails()) {
            return back()->withErrors($valid);
        }

        $user = User::find(Auth::user()->id);

        $user->name = $req->name;
        $user->phone = $req->phone;
        $user->save();

        Alert()->success(__('general.Record Updated Successfully'));
        return back();
    }
    /**
     * ============================
     * ============================
     */
    public function companyInfo()
    {
        $company_mail = CommunicationMdl::where([['user_id', Auth::user()->id], ['con_type', 11]])->first();

        $cons = CommunicationMdl::where('user_id', Auth::user()->id)->get()->pluck('chanel', 'con_type')->all();

        return view('users.company', compact('company_mail', 'cons'));
    }
    /**
     * ============================
     * ============================
     */
    public function changePassword()
    {
        $company_mail = CommunicationMdl::where([['user_id', Auth::user()->id], ['con_type', 11]])->first();
        return view('users.password', compact('company_mail'));
    }

    /**
     * ============================
     * ============================
     */
    public function updatePassword(Request $req)
    {
        $valid = Validator::make($req->all(), [
            'oldPassword' => 'required',
            'password'    => 'required|confirmed|min:8',
        ], [
            'oldPassword.required' => 'Old Password Is Required.',

            'password.required'    => 'New Password Is Required.',
            'password.confirmed'   => 'Format Not Matching.',
            'password.min'         => 'Password Should be Min 8 Chars.',
        ]);

        if ($valid->fails()) {
            return back()->withErrors($valid)->withInput($req->all());
        }

        if (Hash::check($req->oldPassword, Auth::user()->password)) {
            $profile = User::find(Auth::user()->id);
            $profile->password = Hash::make($req->password);
            $profile->save();

            Alert()->success('Password Changed Successfully.');
            return back();
        } else {
            Alert()->error('Old Password is Not Matching.');
            return back();
        }
    }
    /**
     * ============================
     * ============================
     */
}
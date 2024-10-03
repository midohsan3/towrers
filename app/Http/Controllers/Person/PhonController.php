<?php

namespace App\Http\Controllers\Person;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class PhonController extends Controller
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
    public function updatePhone(Request $req)
    {
        $valid = Validator::make($req->all(), [
            'phone' => 'required|numeric|unique:users,phone',
        ], [
            'phone.required' => __('general.Field Is Required'),
            'phone.numeric' => __('general.Format Not Matching'),
            'phone.unique' => __('general.This Field Already Exists'),
        ]);

        if ($valid->fails()) {
            return back()->withErrors($valid)->withInput($req->all());
        }

        $user = User::find(Auth::user()->id);

        $user->phone = $req->phone;
        $user->save();

        return redirect()->route('home');
    }
    /**
     * ============================
     * ============================
     */
}
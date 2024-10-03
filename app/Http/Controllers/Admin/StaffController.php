<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Mail\StaffRegister;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class StaffController extends Controller
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
        $users = User::whereNotIn('role_name', ['Company', 'Person'])->orderBy('id', 'DESC')->paginate(pageCount);

        $usersCount = User::whereNotIn('role_name', ['Company', 'Person'])->count();

        $list_title = __('general.All');

        return view('staff.index', compact('users', 'usersCount', 'list_title'));
    }
    /**
     * ============================
     * ============================
     */
    public function create()
    {

        $roles = Role::whereNotIn('name', ['Company', 'Person', 'Owner'])->orderBy('name', 'ASC')->get();

        return view('staff.create', compact('roles'));
    }
    /**
     * ============================
     * ============================
     */
    public function store(Request $req)
    {
        $valid = Validator::make($req->all(), [
            'name'  => 'required|string|min:3',
            'email'  => 'required|email|unique:users,email',
            'phone' => 'nullable|numeric',
            'role'    => 'required|exists:roles,name',
        ], [
            'name.required' => __('general.Field Is Required'),
            'name.string'    => __('general.Format Not Matching'),
            'name.min'      => __('general.Text Too Short'),

            'email.required' => __('general.Field Is Required'),
            'email.email'     => __('general.Format Not Matching'),
            'email.unique'   => __('general.This Field Already Exists'),

            //'phone.required' => __('general.Field Is Required'),
            'phone.numeric'     => __('general.Format Not Matching'),

            'role.required' => __('general.Field Is Required'),
            'role.exists'       => __('general.This Filed Dosnt Exist'),
        ]);

        if ($valid->fails()) {
            return back()->withErrors($valid)->withInput($req->all());
        }
        $pass = Str::random(9);
        $user = User::create([
            'name' => $req->name,
            'email' => $req->email,
            'phone' => $req->phone,
            'role_name' => $req->role,
            'status' => 0,
            'password' => Hash::make($pass),
        ]);

        $user->assignRole($user->role_name);

        $data = ['id' => $user->id, 'email' => $user->email, 'staff' => $user->name, 'pass' => $pass];

        Mail::to($user->email)->send(new StaffRegister($data));

        Alert()->success(__('general.Record Added Successfully'));
        return redirect()->route('staff.index');
    }
    /**
     * ============================
     * ============================
     */
    public function edit(User $user)
    {
        $user::find($user);

        $roles = Role::whereNotIN('name', ['Owner', 'Company', 'Person'])->orderBy('name', 'ASC')->get();

        return view('staff.edit', compact('user', 'roles'));
    }
    /**
     * ============================
     * ============================
     */
    public function update(Request $req)
    {
        $valid = Validator::make($req->all(), [
            'user_id' => 'required|integer|exists:users,id',
            'name'  => 'required|string|min:3',
            'email'  => 'required|email|unique:users,email,' . $req->user_id . '',
            'phone' => 'nullable|numeric',
            'role'    => 'required|exists:roles,name',
        ], [
            'user_id.required' => __('general.Cant complete Your Request Now'),
            'user_id.integer'  => __('general.Cant complete Your Request Now'),
            'user_id.exists'    => __('general.Cant complete Your Request Now'),

            'name.required' => __('general.Field Is Required'),
            'name.string'    => __('general.Format Not Matching'),
            'name.min'      => __('general.Text Too Short'),

            'email.required' => __('general.Field Is Required'),
            'email.email'     => __('general.Format Not Matching'),
            'email.unique'   => __('general.This Field Already Exists'),

            //'phone.required' => __('general.Field Is Required'),
            'phone.numeric'     => __('general.Format Not Matching'),

            'role.required' => __('general.Field Is Required'),
            'role.exists'       => __('general.This Filed Dosnt Exist'),
        ]);

        if ($valid->fails()) {
            return back()->withErrors($valid)->withInput($req->all());
        }

        $user = User::findOrFail($req->user_id);

        $user->name = $req->name;
        $user->email = $req->email;
        $user->phone = $req->phone;
        $user->role_name = $req->role;
        $user->save();

        DB::table('model_has_roles')->where('model_id', $user->id)->delete();

        $user->assignRole($user->role_name);

        Alert()->success(__('general.Record Updated Successfully'));
        return back();
    }
    /**
     * ============================
     * ============================
     */
    public function changePass(Request $req)
    {

        $valid = Validator::make($req->all(), [
            'userID' => 'required|integer|exists:users,id',
            'password' => 'required|confirmed|string'
        ]);

        if ($valid->fails()) {
            Alert()->error(__('general.Cant complete Your Request Now'));
            return back();
        }

        $user = User::findOrFail($req->userID);

        $user->password = Hash::make($req->password);
        $user->save();

        Alert()->success(__('general.Record Updated Successfully'));
        return back();
    }
    /**
     * ============================
     * ============================
     */
}

<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\CvMdl;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\CommunicationMdl;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class PersonController extends Controller
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
        $users = User::where('role_name', 'Person')->orderBy('id', 'DESC')->paginate(pageCount);

        $usersCount = User::where('role_name', 'Person')->count();

        $communications = CommunicationMdl::select('id', 'user_id')->get()->countBy('user_id')->all();

        $cvs = CvMdl::whereNotNull('user_id')->select('id', 'user_id')->get()->pluck('id', 'user_id')->all();

        $list_title = __('general.All');

        return view('persons.index', compact('users', 'usersCount', 'communications', 'cvs', 'list_title'));
    }
    /**
     * ============================
     * ============================
     */
    public function create()
    {
        return view('persons.create');
    }
    /**
     * ============================
     * ============================
     */
    public function store(Request $req)
    {
        $valid = Validator::make($req->all(), [
            'name'              => 'required|string|min:3',
            'phone'             => 'required|numeric',
            'email'              => 'required|email|unique:users,email',
        ], [
            'name.required' => __('general.Field Is Required'),
            'name.string'    => __('general.Format Not Matching'),
            'name.min'      => __('general.Text Too Short'),

            'phone.required' => __('general.Field Is Required'),
            'phone.numeric' => __('general.Format Not Matching'),

            'email.required' => __('general.Field Is Required'),
            'email.email'      => __('general.Format Not Matching'),
            'email.unique'   => __('general.This Field Already Exists'),
        ]);

        if ($valid->fails()) {
            return back()->withErrors($valid)->withInput($req->all());
        }

        $pas = Str::random(9);

        $user = User::create([
            'name' => $req->name,
            'email' => $req->email,
            'phone' => $req->phone,
            'role_name' => 'Person',
            'approval' => 1,
            'status'     => 1,
            'password' => Hash::make($pas),
        ]);

        $user->assignRole('Person');


        CommunicationMdl::create([
            'user_id'    => $user->id,
            'con_type' => 1,
            'chanel'    => $req->phone,
        ]);
        CommunicationMdl::create([
            'user_id'    => $user->id,
            'con_type' => 11,
            'chanel'    => $req->email,
        ]);

        Alert()->success(__('general.Record Added Successfully'));
        return redirect()->route('person.index');
    }
    /**
     * ============================
     * ============================
     */
    public function edit(User $user)
    {
        $user::find($user);
        return view('persons.edit', compact('user'));
    }
    /**
     * ============================
     * ============================
     */
    public function update(Request $req)
    {
        $valid = Validator::make($req->all(), [
            'user_id'             => 'required|integer|exists:users,id',
            'name'              => 'required|string|min:3',
            'phone'             => 'required|numeric',
            'email'              => 'required|email|unique:users,email,' . $req->user_id . '',
        ], [
            'user_id.required' => __('general.Cant complete Your Request Now'),
            'user_id.integer' => __('general.Cant complete Your Request Now'),
            'user_id.exists' => __('general.Cant complete Your Request Now'),

            'name.required' => __('general.Field Is Required'),
            'name.string'    => __('general.Format Not Matching'),
            'name.min'      => __('general.Text Too Short'),

            'phone.required' => __('general.Field Is Required'),
            'phone.numeric' => __('general.Format Not Matching'),

            'email.required' => __('general.Field Is Required'),
            'email.email'      => __('general.Format Not Matching'),
            'email.unique'   => __('general.This Field Already Exists'),
        ]);

        if ($valid->fails()) {
            return back()->withErrors($valid)->withInput($req->all());
        }

        $user = User::findOrFail($req->user_id);

        $user->name = $req->name;
        $user->email = $req->email;
        $user->phone = $req->phone;
        $user->save();

        Alert()->success(__('general.Record Updated Successfully'));
        return back();
    }
    /**
     * ============================
     * ============================
     */
    public function activate(Request $req)
    {
        $valid = Validator::make($req->all(), [
            'userID' => 'required|integer|exists:users,id'
        ]);

        if ($valid->fails()) {
            Alert()->error(__('general.Cant complete Your Request Now'));
            return back();
        }

        $user = User::findOrFail($req->userID);

        $user->status = 1;
        $user->approval = 1;
        $user->save();

        Alert()->success(__('general.Record Activated Successfully'));
        return back();
    }
    /**
     * ============================
     * ============================
     */
    public function deactivate(Request $req)
    {
        $valid = Validator::make($req->all(), [
            'userID' => 'required|integer|exists:users,id'
        ]);

        if ($valid->fails()) {
            Alert()->error(__('general.Cant complete Your Request Now'));
            return back();
        }

        $user = User::findOrFail($req->userID);

        $user->status = 0;
        $user->approval = 0;
        $user->save();

        Alert()->success(__('general.Record Deactivated Successfully'));
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
            'companyID' => 'required|integer|exists:companies,id',
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
    public function destroy(Request $req)
    {
        $valid = Validator::make($req->all(), [
            'userID' => 'required|integer|exists:users,id'
        ]);

        if ($valid->fails()) {
            Alert()->error(__('general.Cant complete Your Request Now'));
            return back();
        }

        $user = User::findOrFail($req->userID);

        $cvs = CvMdl::where('user_id', $user->id)->get();
        if ($cvs->count() > 0) {
            foreach ($cvs as $cv) {
                $cv->delete();
            }
        }

        $user->delete();

        Alert()->success(__('general.Record Deleted Successfully'));
        return back();
    }
    /**
     * ============================
     * ============================
     */
}

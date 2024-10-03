<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\CompanyMdl;
use Illuminate\Http\Request;
use App\Models\CommunicationMdl;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class CommunicationController extends Controller
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
    public function index($company)
    {
        $company = CompanyMdl::find($company);

        $communications = CommunicationMdl::where('user_id', $company->user_id)->orderBy('con_type', 'ASC')->paginate(pageCount);

        $communicationsCount = CommunicationMdl::where('user_id', $company->user_id)->count();

        return view('communications.index', compact('company', 'communications', 'communicationsCount'));
    }
    /**
     * ============================
     * ============================
     */
    public function store(Request $req)
    {
        $valid = Validator::make($req->all(), [
            'user'       => 'required|integer|exists:users,id',
            'con_type' => 'required|integer',
            'chanel'    => 'required|string',
        ]);

        if ($valid->fails()) {
            Alert()->error(__('general.Cant complete Your Request Now'));
            return back();
        }

        CommunicationMdl::create([
            'user_id'    => $req->user,
            'con_type' => $req->con_type,
            'chanel'    => $req->chanel,
        ]);

        if($req->con_type == 1){
            $user = User::find($req->user);

            $user->phone = $req->chanel;
            $user->save();
        }

        Alert()->success(__('general.Record Added Successfully'));
        return back();
    }
    /**
     * ============================
     * ============================
     */
    public function edit(CommunicationMdl $con)
    {
        $con::find($con);
        return view('communications.edit', compact('con'));
    }
    /**
     * ============================
     * ============================
     */
    public function update(Request $req)
    {
        $valid = Validator::make($req->all(), [
            'conID'     => 'required|integer|exists:communications,id',
            'con_type' => 'required|integer',
            'chanel'    => 'required|string',
        ], [
            'conID.required' => __('general.Cant complete Your Request Now'),
            'conID.integer'  => __('general.Cant complete Your Request Now'),
            'conID.exists'    => __('general.Cant complete Your Request Now'),

            'con_type.required' => __('general.Field Is Required'),
            'con_type.integer'  => __('general.Format Not Matching'),

            'chanel.required' => __('general.Field Is Required'),
            'chanel.string'  => __('general.Format Not Matching'),
        ]);

        if ($valid->fails()) {
            return back()->withErrors($valid)->withInput($req->all());
        }

        $conn = CommunicationMdl::findOrFail($req->conID);

        $conn->con_type = $req->con_type;
        $conn->chanel    = $req->chanel;
        $conn->save();

        Alert()->success(__('general.Record Updated Successfully'));
        return redirect()->route('communication.index', $conn->userCon->companyUser->id);
    }
    /**
     * ============================
     * ============================
     */
    public function destroy(Request $req)
    {
        $valid = Validator::make($req->all(), [
            'conID' => 'required|integer|exists:communications,id'
        ]);

        if ($valid->fails()) {
            Alert()->error(__('general.Cant complete Your Request Now'));
            return back();
        }

        $conn = CommunicationMdl::findOrFail($req->conID);

        $conn->forceDelete();

        Alert()->success(__('general.Record Deleted Successfully'));
        return back();
    }
    /**
     * ============================
     * ============================
     */
}
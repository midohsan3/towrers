<?php

namespace App\Http\Controllers\Company;

use App\Models\CompanyMdl;
use Illuminate\Http\Request;
use App\Models\CommunicationMdl;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CSocialController extends Controller
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
        $company = CompanyMdl::where('user_id', Auth::user()->id)->first();

        $communications = CommunicationMdl::where('user_id', Auth::user()->id)->orderBy('con_type', 'ASC')->paginate(pageCount);

        $communicationsCount = CommunicationMdl::where('user_id', Auth::user()->id)->count();

        return view('companyCommunications.index', compact('company', 'communications', 'communicationsCount'));
    }
    /**
     * ============================
     * ============================
     */
}
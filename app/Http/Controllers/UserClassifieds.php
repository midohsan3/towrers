<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ClassifiedMdl;
use Illuminate\Support\Facades\Auth;

class UserClassifieds extends Controller
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
        $classifieds = ClassifiedMdl::where('user_id', Auth::user()->id)->orderBy('id', 'DESC')->paginate(pageCount);

        $classifiedsCount = ClassifiedMdl::where('user_id', Auth::user()->id)->count();

        $list_title = __('general.All');
        return view('userClassifieds.index', compact('classifieds', 'classifiedsCount', 'list_title'));
    }
    /**
     * ============================
     * ============================
     */
}
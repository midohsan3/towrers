<?php

namespace App\Http\Controllers\Company;

use App\Models\CompanyMdl;
use Illuminate\Http\Request;
use App\Models\CompanySliderMdl;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CSliderController extends Controller
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
        $sliders = CompanySliderMdl::where('user_id', Auth::user()->id)->orderBy('id', 'DESC')->paginate(pageCount);

        $slidersCount = CompanySliderMdl::where('user_id', Auth::user()->id)->count();

        return view('companySlider.index', compact('sliders', 'slidersCount'));
    }
    /**
     * ============================
     * ============================
     */
}

<?php

namespace App\Http\Controllers\Person;

use App\Models\InterestMdl;
use Illuminate\Http\Request;
use App\Models\UserInterestMdl;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;

class PInterestController extends Controller
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
   * ============================
   * INDEX
   * ============================
   */
   public function index(){
        if(App::getLocale()=='ar'){
                $interests = InterestMdl::where([['name_en','!=','General'],['status',1]])->orderBy('name_ar','asc')->get();
        }else{
                $interests = InterestMdl::where([['name_en','!=','General'],['status',1]])->orderBy('name_en','asc')->get();
        }

        $userInterests = UserInterestMdl::select('user_id','interest_id')->get()->pluck('user_id','interest_id')->all();

        return view('interest.choose',compact('interests','userInterests'));
   }
   /**
   * ============================
   *
   * ============================
   */
}
<?php

namespace App\Http\Controllers\Company;

use App\Models\User;
use App\Models\InterestMdl;
use Illuminate\Http\Request;
use App\Models\UserInterestMdl;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class CInterestController extends Controller
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
   * UPDATE
   * ============================
   */
  public function update(Request $req){
    $valid = Validator::make($req->all(),[
        'user'    =>'required|numeric|exists:users,id',
        'interest'=>'required',
    ],[
        'user.required' =>__('general.Field Is Required'),
        'user.numeric' =>__('general.Format Not Matching'),
        'user.exists' =>__('general.This Filed Dosnt Exist'),
        'interest.required' =>__('general.Field Is Required'),
    ]);

    if($valid->fails()){
        return back()->withErrors($valid)->withInput($req->all());
    }

    $user = User::findOrFail($req->user);

    $user->interest_has_user()->sync($req->interest);

    Alert()->success(__('general.Record Updated Successfully'));
    return back();
  }
   /**
   * ============================
   *
   * ============================
   */
}

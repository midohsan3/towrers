<?php

namespace App\Http\Controllers\Admin;

use App\Models\InterestMdl;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\UserInterestMdl;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class InterestController extends Controller
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
            $interests = InterestMdl::orderBy('name_ar','ASC')->paginate(pageCount);
        }else{
            $interests = InterestMdl::orderBy('name_en','ASC')->paginate(pageCount);
        }

        $interestsCount = $interests->count();

        $users = UserInterestMdl::select('user_id','interest_id')->get()->countBy('interest_id')->all();

        $list_title = __('general.All');

        return view('interest.index',compact('interests','interestsCount','list_title','users'));
    }
    /**
    * ============================
    * CREATE
    * ============================
    */
    public function create(){
        return view('interest.create');
    }
    /**
    * ============================
    * STORE
    * ============================
    */
    public function store(Request $req){
        $valid = Validator::make($req->all(),[
            'name_ar' =>'required|string',
            'name_en' =>'required|string',
        ],[
            'name_ar.required' =>__('general.Field Is Required'),
            'name_ar.string'   =>__('general.Format Not Matching'),

            'name_en.required' =>__('general.Field Is Required'),
            'name_en.string' =>__('general.Format Not Matching'),
        ]);

        if($valid->fails()){
            return back()->withErrors($valid)->withInput($req->all());
        }

        $interest = InterestMdl::create([
            'name_ar' => $req->name_ar,
            'name_en' => Str::title($req->name_en),
        ]);

        Alert()->success(__('general.Record Added Successfully'));
        return redirect()->route('interest.index');
    }
    /**
    * ============================
    * SHOW
    * ============================
    */
    public function show($interest){
        $interest = InterestMdl::find($interest);

        $users = UserInterestMdl::where('interest_id',$interest->id)->count();

        return view('interest.show', compact('interest','users'));
    }
    /**
    * ============================
    *EDIT
    * ============================
    */
    public function edit($interest){
        $interest = InterestMdl::find($interest);

        return view('interest.edit', compact('interest'));
    }
    /**
    * ============================
    * UPDATE
    * ============================
    */
    public function update(Request $req){
        $valid = Validator::make($req->all(),[
            'interest_id' =>'required|numeric|exists:interests,id',
            'name_ar' =>'required|string',
            'name_en' =>'required|string',
        ],[
            'name_ar.required' =>__('general.Field Is Required'),
            'name_ar.string' =>__('general.Format Not Matching'),

            'name_en.required' =>__('general.Field Is Required'),
            'name_en.string' =>__('general.Format Not Matching'),
        ]);

        if($valid->fails()){
            return back()->withErrors($valid)->withInput($req->all());
        }

        $interest = InterestMdl::find($req->interest_id);

        $interest->name_ar = $req->name_ar;
        $interest->name_en = $req->name_en;
        $interest->save();

        Alert()->success(__('general.Record Updated Successfully'));
        return back();
    }
    /**
    * ============================
    * ACTIVATE
    * ============================
    */
    public function activate(Request $req){
        $valid = Validator::make($req->all(),[
            'interestID' =>'required|numeric|exists:interests,id'
        ]);

        if ($valid->fails()) {
            return back()->withErrors($valid)->withInput($req->all());
        }

        $interest = InterestMdl::find($req->interestID);

        $interest->status = 1;
        $interest->save();

        Alert()->success(__('general.Record Activated Successfully'));
        return back();
    }
    /**
    * ============================
    * DEACTIVATE
    * ============================
    */
    public function deactivate(Request $req){
        $valid = Validator::make($req->all(),[
            'interestID' =>'required|numeric|exists:interests,id'
        ]);

        if ($valid->fails()) {
            return back()->withErrors($valid)->withInput($req->all());
        }

        $interest = InterestMdl::find($req->interestID);

        $interest->status = 0;
        $interest->save();

        Alert()->success(__('general.Record Deactivated Successfully'));
        return back();
    }
    /**
    * ============================
    * DESTROY
    * ============================
    */
    public function destroy(Request $req){
        $valid = Validator::make($req->all(),[
            'interestID' =>'required|numeric|exists:interests,id'
        ]);

        if ($valid->fails()) {
            return back()->withErrors($valid)->withInput($req->all());
        }

        $interest = InterestMdl::find($req->interestID);

        $interest->delete();

        Alert()->success(__('general.Record Deleted Successfully'));
        return back();
    }
    /**
    * ============================
    *
    * ============================
    */
}
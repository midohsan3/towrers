<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\JobMdl;
use App\Models\ProjectMdl;
use App\Models\InterestMdl;
use Illuminate\Http\Request;
use App\Models\InstructionMdl;
use App\Notifications\General;
use Illuminate\Support\Carbon;
use App\Models\UserInterestMdl;
use App\Notifications\NewProduct;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\ProductMdl;
use App\Notifications\NewJob;
use App\Notifications\NewProject;
use App\Notifications\SpecialNot;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Notification;

class InstructionController extends Controller
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
        $instructions = InstructionMdl::orderBy('id','desc')->paginate(pageCount);

        return view('instruction.index', compact('instructions'));
    }
    /**
    * ============================
    * CREATE GENERAL
    * ============================
    */
    public function create_general(){
        return view('instruction.create_general');
    }
    /**
    * ============================
    * STORE GENERAL
    * ============================
    */
    public function store_general(Request $req){
        $valid = Validator::make($req->all(),[
            'name_ar' =>'required|string',
            'name_en' =>'required|string',
        ],[
            'name_ar.required' =>__('general.Field Is Required'),
            'nameAr.string' =>__('general.Format Not Matching'),

            'name_ar.required' =>__('general.Field Is Required'),
            'name_en.string' =>__('general.Format Not Matching'),
        ]);

        if($valid->fails()){
            return back()->withErrors($valid)->withInput($req->all());
        }

        $interest = InterestMdl::where([['name_en','General'],['status',1]])->first();

        $instruction = InstructionMdl::create([
            'interest_id' =>$interest->id,
            'name_en' =>$req->name_en,
            'name_ar' =>$req->name_ar,
        ]);

        $users = User::whereIn('role_name',['Company',['Person']])->get();

        Notification::send($users,new General($instruction->name_en,$instruction->name_ar));

        Alert()->success(__('general.Record Updated Successfully'));
        return back();
    }
    /**
    * ============================
    * CREATE PROJECT
    * ============================
    */
    public function create_project(){
        $projects = ProjectMdl::where('status',1)->get();
        return view('instruction.create_project', compact('projects'));
    }
    /**
    * ============================
    * STORE PROJECT
    * ============================
    */
    public function store_project(Request $req){
        $valid = Validator::make($req->all(),[
            'project' =>'required|numeric|exists:projects,id',
            'name_ar' =>'required|string',
            'name_en' =>'required|string',
        ],[
            'project.required' =>__('general.Field Is Required'),
            'project.numeric'  =>__('general.Format Not Matching'),
            'project.exists'   =>__('general.Value Not Accepted'),

            'name_ar.required' =>__('general.Field Is Required'),
            'name_ar.string'   =>__('general.Format Not Matching'),

            'name_ar.required' =>__('general.Field Is Required'),
            'name_en.string'   =>__('general.Format Not Matching'),
        ]);

        if($valid->fails()){
            return back()->withErrors($valid)->withInput($req->all());
        }

        $project = ProjectMdl::find($req->project);

        $interest = InterestMdl::where('name_en','Projects')->first();

        $instruction = InstructionMdl::create([
            'interest_id' =>$interest->id,
            'project_id'  =>$project->id,
            'name_en'     =>$project->name_en.' '.$req->name_en,
            'name_ar'     =>$project->name_ar.' '.$req->name_ar,
        ]);

       $usersInterest =
       UserInterestMdl::select('user_id')->where('interest_id',$interest->id)->get()->pluck('user_id')->toArray();

       $users = User::whereIn('id',$usersInterest)->get();

        Notification::send($users,new NewProject($instruction->project_id,$instruction->name_en,$instruction->name_ar));

        Alert()->success(__('general.Record Updated Successfully'));
        return back();
    }
    /**
    * ============================
    * CREATE JOB
    * ============================
    */
    public function create_job(){
        $jobs = JobMdl::get();
        return view('instruction.create_job', compact('jobs'));
    }
    /**
    * ============================
    * STORE JOB
    * ============================
    */
    public function store_job(Request $req){
        $valid = Validator::make($req->all(),[
            'job'     =>'required|numeric|exists:jobs,id',
            'name_ar' =>'required|string',
            'name_en' =>'required|string',
        ],[
            'job.required' =>__('general.Field Is Required'),
            'job.numeric'  =>__('general.Format Not Matching'),
            'job.exists'   =>__('general.Value Not Accepted'),

            'name_ar.required' =>__('general.Field Is Required'),
            'name_ar.string'   =>__('general.Format Not Matching'),

            'name_ar.required' =>__('general.Field Is Required'),
            'name_en.string'   =>__('general.Format Not Matching'),
        ]);

        if($valid->fails()){
            return back()->withErrors($valid)->withInput($req->all());
        }

        $job = JobMdl::find($req->job);

        $interest = InterestMdl::where('name_en','Jobs')->first();

        $instruction = InstructionMdl::create([
            'interest_id' =>$interest->id,
            'job_id'      =>$job->id,
            'name_en'     =>$job->name_en.' '.$req->name_en,
            'name_ar'     =>$job->name_ar.' '.$req->name_ar,
        ]);

        $usersInterest =
        UserInterestMdl::select('user_id')->where('interest_id',$interest->id)->get()->pluck('user_id')->toArray();

        $users = User::whereIn('id',$usersInterest)->get();

        Notification::send($users,new NewJob($instruction->job_id,$instruction->name_en,$instruction->name_ar));

        Alert()->success(__('general.Record Updated Successfully'));
        return back();
    }
    /**
    * ============================
    * CREATE PRODUCT
    * ============================
    */
    public function create_product(){
        $products = ProductMdl::get();
        return view('instruction.create_product', compact('products'));
    }
    /**
    * ============================
    * STORE PRODUCT
    * ============================
    */
    public function store_product(Request $req){
        $valid = Validator::make($req->all(),[
            'product'     =>'required|numeric|exists:products,id',
            'name_ar' =>'required|string',
            'name_en' =>'required|string',
        ],[
            'product.required' =>__('general.Field Is Required'),
            'product.numeric'  =>__('general.Format Not Matching'),
            'product.exists'   =>__('general.Value Not Accepted'),

            'name_ar.required' =>__('general.Field Is Required'),
            'name_ar.string'   =>__('general.Format Not Matching'),

            'name_ar.required' =>__('general.Field Is Required'),
            'name_en.string'   =>__('general.Format Not Matching'),
        ]);

        if($valid->fails()){
            return back()->withErrors($valid)->withInput($req->all());
        }

        $product = ProductMdl::find($req->product);

        $interest = InterestMdl::where('name_en','Products')->first();

        $instruction = InstructionMdl::create([
            'interest_id' =>$interest->id,
            'product_id'  =>$product->id,
            'name_en'     =>$product->name_en.' '.$req->name_en,
            'name_ar'     =>$product->name_ar.' '.$req->name_ar,
        ]);

        $usersInterest =
        UserInterestMdl::select('user_id')->where('interest_id',$interest->id)->get()->pluck('user_id')->toArray();

        $users = User::whereIn('id',$usersInterest)->get();

        Notification::send($users,new NewProduct($instruction->product_id,$instruction->name_en,$instruction->name_ar));

        Alert()->success(__('general.Record Updated Successfully'));
        return back();
    }
    /**
    * ============================
    * CREATE USER
    * ============================
    */
    public function create_user(){
        $users = User::where('role_name','Company')->get();
        return view('instruction.create_USER', compact('users'));
    }
    /**
    * ============================
    * STORE USER
    * ============================
    */
    public function store_user(Request $req){
        $valid = Validator::make($req->all(),[
            'user'     =>'required|numeric|exists:users,id',
            'name_ar' =>'required|string',
            'name_en' =>'required|string',
        ],[
            'user.required' =>__('general.Field Is Required'),
            'user.numeric'  =>__('general.Format Not Matching'),
            'user.exists'   =>__('general.Value Not Accepted'),

            'name_ar.required' =>__('general.Field Is Required'),
            'name_ar.string'   =>__('general.Format Not Matching'),

            'name_ar.required' =>__('general.Field Is Required'),
            'name_en.string'   =>__('general.Format Not Matching'),
        ]);

        if($valid->fails()){
            return back()->withErrors($valid)->withInput($req->all());
        }

        $interest =
        InterestMdl::where([['name_en','General'],['status',1]])->first();

        $instruction = InstructionMdl::create([
        'interest_id' =>$interest->id,
        'name_en'     =>$req->name_en,
        'name_ar'     =>$req->name_ar,
        ]);

        $users = User::find($req->user);

        Notification::send($users,new SpecialNot($instruction->name_en,$instruction->name_ar));
        return back();
    }
    /**
    * ============================
    *
    * ============================
    */
    public function readAll(){
        if(Auth::check()){
            $read_notify =
            DB::table('notifications')->where('notifiable_id',Auth::user()->id)->get();
            if($read_notify){
                foreach($read_notify as $notify){
                    DB::table('notifications')->where('id',$notify->id)->Update(['read_at'=>Carbon::now()]);
                }
            }
        }

        return back();
    }
    /**
    * ============================
    *
    * ============================
    */
}
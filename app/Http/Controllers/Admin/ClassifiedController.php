<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\SizeMdl;
use Illuminate\Http\Request;
use App\Models\ClassifiedMdl;
use Illuminate\Support\Carbon;
use App\Models\CommunicationMdl;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;
use App\Models\ClassifiedPackageMdl;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ClassifiedController extends Controller
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
    $classifieds = ClassifiedMdl::orderBy('id', 'DESC')->paginate(pageCount);

    $classifiedsCount = ClassifiedMdl::count();

    $list_title = __('general.All');
    return view('classifieds.index', compact('classifieds', 'classifiedsCount', 'list_title'));
  }
  /**
   * ============================
   * ============================
   */
  public function create()
  {
    $users = User::whereIn('role_name', ['Company', 'Person'])->orderBy('id', 'ASC')->get();

    if (App::getLocale() == 'ar') {
      $packages = ClassifiedPackageMdl::where('status', 1)->orderBy('name_ar', 'ASC')->get();
    } else {
      $packages = ClassifiedPackageMdl::where('status', 1)->orderBy('name_en', 'ASC')->get();
    }
    return view('classifieds.create', compact('users', 'packages'));
  }
  /**
   * ============================
   * ============================
   */
  public function usrInfo($user)
  {
    $user = User::find($user);

    if ($user->role_name == 'Company') {
      $userName = $user->companyUser->name_en;
    } else {
      $userName = $user->name;
    }

    $phone = CommunicationMdl::where([['user_id', $user->id], ['con_type', 1]])->first();
    if ($phone) {
      $phone_con = $phone->chanel;
    } else {
      $phone_con = null;
    }

    $wahtsApp = CommunicationMdl::where([['user_id', $user->id], ['con_type', 3]])->first();

    if ($wahtsApp) {
      $whats_con = $wahtsApp->chanel;
    } else {
      $whats_con = null;
    }

    if ($user) {
      $html = '';
      $html .= '
            <div class="col-sm-6">
                      <div class="form-group">
                        <label class="form-label" for="userName">
                        ' . __('classified.User') . '
                        </label>
                        <div class="form-control-wrap">
                          <input type="text" class="form-control" name="userName" id="userName"
                            value="' . old("userName", $userName) . ' " />
                        </div>
                      </div>
                    </div>

                    <div class="col-sm-6">
                      <div class="form-group">
                        <label class="form-label" for="phone">
                        ' . __("company.Phone") . '
                        </label>
                        <div class="form-control-wrap">
                          <input type="text" class="form-control" name="phone" id="phone" value="' . old("phone", $phone_con) . '" />
                        </div>
                      </div>
                    </div>

                    <div class="col-sm-6">
                      <div class="form-group">
                        <label class="form-label" for="whatsapp">' . __("company.WhatsApp") . ' </label>
                        <div class="form-control-wrap">
                          <input type="text" class="form-control" name="whatsapp" id="whatsapp"
                            value="' . old("whatsapp", $whats_con) . ' " />
                        </div>
                      </div>
                    </div>
                    ';
      return response()->json(['success' => $html]);
    } else {
      $html = '';
      $html .= '
            <div class="col-sm-6">
                      <div class="form-group">
                        <label class="form-label" for="userName">
                        ' . __('classified.User') . '
                        </label>
                        <div class="form-control-wrap">
                          <input type="text" class="form-control" name="userName" id="userName"
                            value="' . old("userName") . ' " />
                          ' . @error("userName") . '
                          <span class="bg-danger text-white" role="alert">
                          ' . $message . '
                          </span>
                          ' . @enderror . '
                        </div>
                      </div>
                    </div>

                    <div class="col-sm-6">
                      <div class="form-group">
                        <label class="form-label" for="phone">
                        ' . __("company.Phone") . '
                        </label>
                        <div class="form-control-wrap">
                          <input type="text" class="form-control" name="phone" id="phone" value="' . old("phone") . '" />
                          ' . @error("phone") . '
                          <span class="bg-danger text-white" role="alert"> ' . $message . ' </span>
                          ' . @enderror . '
                        </div>
                      </div>
                    </div>

                    <div class="col-sm-6">
                      <div class="form-group">
                        <label class="form-label" for="whatsapp">' . __("company.WhatsApp") . ' </label>
                        <div class="form-control-wrap">
                          <input type="text" class="form-control" name="whatsapp" id="whatsapp"
                            value="' . old("whatsapp") . ' " />
                          ' . @error("whatsapp") . '
                          <span class="bg-danger text-white" role="alert"> ' . $message . ' </span>
                          ' . @enderror . '
                        </div>
                      </div>
                    </div>
                    ';
      return response()->json(['success' => $html]);
    }
  }
  /**
   * ============================
   * ============================
   */
  public function packageAmount($package)
  {
    $package = ClassifiedPackageMdl::find($package);

    if ($package) {
      $amount = number_format($package->price, 2);
    } else {
      $amount = 0.00;
    }
    return response()->json(['success' => $amount]);
  }
  /**
   * ============================
   * ============================
   */
  public function store(Request $req)
  {
    $valid = Validator::make($req->all(), [
      'user'       => 'nullable|integer|exists:users,id',
      'name_ar' => 'required|string',
      'name_en' => 'required|string',
      'package' => 'required|integer|exists:classifieds_packages,id',
      'photo'    => 'required|image|mimes:jpeg,png,jpg,gif',
      'amount' => 'required|numeric',
      'userName' => 'required|string',
    ], [
      //'user.required' => __('general.Field Is Required'),
      'user.integer'  => __('general.Format Not Matching'),
      'user.exists'    => __('general.This Filed Dosnt Exist'),

      'name_ar.required' => __('general.Field Is Required'),
      'name_ar.string'  => __('general.Format Not Matching'),

      'name_en.required' => __('general.Field Is Required'),
      'name_en.string'  => __('general.Format Not Matching'),

      'package.required' => __('general.Field Is Required'),
      'package.integer'  => __('general.Format Not Matching'),
      'package.exists'    => __('general.This Filed Dosnt Exist'),

      'photo.required'     => __('general.Field Is Required'),
      'photo.image'        => __('general.The file you uploaded is Not Image'),
      'photo.mimes'        => __('general.Image formate is not allowed'),

      'amount.required' => __('general.Field Is Required'),
      'amount.numeric'  => __('general.Format Not Matching'),

      'userName.required' => __('general.Field Is Required'),
      'userName.string'  => __('general.Format Not Matching'),
    ]);

    if ($valid->fails()) {
      return back()->withErrors($valid)->withInput($req->all());
    }

    $package = ClassifiedPackageMdl::findOrFail($req->package);

    $size = SizeMdl::find($package->size_id);

    if ($req->hasFile('photo')) {
      $img = $req->file('photo');
      $imgName = rand() . '.' . $img->getClientOriginalExtension();
      //save file like a temp
      $img->move(('imgs/ads'), $imgName);
      //RESIZING THE PICTURE AND MAKE A COPY WITH NEW SIZE IN STOREAGE FILE
      $resize = Image::make("imgs/ads/{$imgName}")->resize($size->width, $size->height)->encode('png');
      Storage::put("public/imgs/ads/{$imgName}", $resize->__toString());
      //delete the file as a temp
      File::delete('imgs/ads/' . $imgName);
    } else {
      $imgName = null;
    }



    ClassifiedMdl::create([
      'user_id'                  => $req->user,
      'classified_package_id' => $package->id,
      'size_id'                   => $size->id,
      'name'                    => $req->userName,
      'phone'                    => $req->phone,
      'whatsapp'               => $req->whatsapp,
      'title_en'                  => $req->name_en,
      'title_ar'                  => $req->name_ar,
      'photo'                    => $imgName,
      'paid_amount'           => $req->amount,
      'started_at'              => Carbon::now(),
      'ended_at'                => Carbon::now()->addDays($package->period),
      'link'                      => $req->link,
    ]);

    $users = User::whereIn('role_name', ['Company', 'Person'])->orderBy('id', 'ASC')->get();

    Alert()->success(__('general.Record Added Successfully'));

    if (Auth::user()->role_name == 'Company' || Auth::user()->role_name == 'Person') {
      return redirect()->route('userClassifieds.index');
    } else {
      return redirect()->route('classified.index');
    }
  }
  /**
   * ============================
   * ============================
   */
  public function edit(ClassifiedMdl $classified)
  {
    $classified::find($classified);

    $users = User::whereIn('role_name', ['Company', 'Person'])->orderBy('id', 'ASC')->get();

    if (App::getLocale() == 'ar') {
      $packages = ClassifiedPackageMdl::where('status', 1)->orderBy('name_ar', 'ASC')->get();
    } else {
      $packages = ClassifiedPackageMdl::where('status', 1)->orderBy('name_en', 'ASC')->get();
    }
    return view('classifieds.edit', compact('classified', 'users', 'packages'));
  }
  /**
   * ============================
   * ============================
   */
  public function update(Request $req)
  {
    $valid = Validator::make($req->all(), [
      'classified_id' => 'required|integer|exists:classifieds,id',
      'user'       => 'nullable|integer|exists:users,id',
      'name_ar' => 'required|string',
      'name_en' => 'required|string',
      'package' => 'required|integer|exists:classifieds_packages,id',
      'photo'    => 'nullable|image|mimes:jpeg,png,jpg,gif',
      'amount' => 'required|numeric',
      'userName' => 'required|string',
    ], [
      'classified_id.required' => __('general.Cant complete Your Request Now'),
      'classified_id.integer' => __('general.Cant complete Your Request Now'),
      'classified_id.exists' => __('general.Cant complete Your Request Now'),

      //'user.required' => __('general.Field Is Required'),
      'user.integer'  => __('general.Format Not Matching'),
      'user.exists'    => __('general.This Filed Dosnt Exist'),

      'name_ar.required' => __('general.Field Is Required'),
      'name_ar.string'  => __('general.Format Not Matching'),

      'name_en.required' => __('general.Field Is Required'),
      'name_en.string'  => __('general.Format Not Matching'),

      'package.required' => __('general.Field Is Required'),
      'package.integer'  => __('general.Format Not Matching'),
      'package.exists'    => __('general.This Filed Dosnt Exist'),

      'photo.required'     => __('general.Field Is Required'),
      'photo.image'        => __('general.The file you uploaded is Not Image'),
      'photo.mimes'        => __('general.Image formate is not allowed'),

      'amount.required' => __('general.Field Is Required'),
      'amount.numeric'  => __('general.Format Not Matching'),

      'userName.required' => __('general.Field Is Required'),
      'userName.string'  => __('general.Format Not Matching'),
    ]);

    if ($valid->fails()) {
      return back()->withErrors($valid)->withInput($req->all());
    }

    $package = ClassifiedPackageMdl::findOrFail($req->package);

    $size = SizeMdl::find($package->size_id);

    if ($req->hasFile('photo')) {
      $img = $req->file('photo');
      $imgName = rand() . '.' . $img->getClientOriginalExtension();
      //save file like a temp
      $img->move(('imgs/ads'), $imgName);
      //RESIZING THE PICTURE AND MAKE A COPY WITH NEW SIZE IN STOREAGE FILE
      $resize = Image::make("imgs/ads/{$imgName}")->resize($size->width, $size->height)->encode('png');
      Storage::put("public/imgs/ads/{$imgName}", $resize->__toString());
      //delete the file as a temp
      File::delete('imgs/ads/' . $imgName);
      File::delete('storage/app/public/imgs/ads/' . $req->old_photo);
    } else {
      $imgName = $req->old_photo;
    }

    $classified = ClassifiedMdl::findOrFail($req->classified_id);

    $classified->user_id                  = $req->user;
    $classified->classified_package_id = $package->id;
    $classified->size_id                   = $size->id;
    $classified->name                    = $req->userName;
    $classified->phone                    = $req->phone;
    $classified->whatsapp               = $req->whatsapp;
    $classified->title_en                  = $req->name_en;
    $classified->title_ar                  = $req->name_ar;
    $classified->photo                    = $imgName;
    $classified->paid_amount           = $req->amount;
    $classified->link                       = $req->link;
    $classified->save();

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
      'classifiedID' => 'required|integer|exists:classifieds,id'
    ]);

    if ($valid->fails()) {
      Alert()->error(__('general.Cant complete Your Request Now'));
      return back();
    }

    $classified = ClassifiedMdl::findOrFail($req->classifiedID);

    $classified->status = 1;
    $classified->save();

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
      'classifiedID' => 'required|integer|exists:classifieds,id'
    ]);

    if ($valid->fails()) {
      Alert()->error(__('general.Cant complete Your Request Now'));
      return back();
    }

    $classified = ClassifiedMdl::findOrFail($req->classifiedID);

    $classified->status = 0;
    $classified->save();

    Alert()->success(__('general.Record Deactivated Successfully'));
    return back();
  }
  /**
   * ============================
   * ============================
   */
  public function destroy(Request $req)
  {
    $valid = Validator::make($req->all(), [
      'classifiedID' => 'required|integer|exists:classifieds,id'
    ]);

    if ($valid->fails()) {
      Alert()->error(__('general.Cant complete Your Request Now'));
      return back();
    }

    $classified = ClassifiedMdl::findOrFail($req->classifiedID);

    $classified->delete();

    Alert()->success(__('general.Record Deleted Successfully'));
    return back();
  }
  /**
   * ============================
   * ============================
   */
}
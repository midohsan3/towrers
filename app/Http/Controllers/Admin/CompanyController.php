<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\JobMdl;
use App\Models\CityMdl;
use App\Models\MajorMdl;
use App\Models\OrderMdl;
use App\Models\CompanyMdl;
use App\Models\PackageMdl;
use App\Models\ProductMdl;
use App\Models\SectionMdl;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\OldProjectMdl;
use App\Models\CompanyMajorMdl;
use App\Models\ProductPhotoMdl;
use App\Models\SubscriptionMdl;
use App\Models\CommunicationMdl;
use App\Models\CompanySliderMdl;
use App\Models\CompanyProjectMdl;
use App\Models\OldProjectPhotoMdl;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;
use App\Models\UserInterestMdl;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class CompanyController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('permission:company-list', ['only' => ['index']]);
        $this->middleware('permission:company-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:company-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:company-activate|company-deactivate', ['only' => ['activate', 'deactivate']]);
        $this->middleware('permission:company-delete', ['only' => ['destroy']]);

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
        $companies = User::where('role_name', 'Company')->orderBy('id', 'DESC')->paginate(pageCount);

        $companiesCount = User::where('role_name', 'Company')->count();

        $companyInterests = UserInterestMdl::select('user_id','interest_id')->get()->countBy('user_id')->all();

        $sections = SectionMdl::orderBy('id', 'ASC')->get();

        $majors = CompanyMajorMdl::select('id', 'company_id')->get()->countBy('company_id')->all();

        $communications = CommunicationMdl::select('id', 'user_id')->get()->countBy('user_id')->all();

        $projects = CompanyProjectMdl::select('id', 'company_id')->get()->countBy('company_id')->all();

        $list_title = __('general.All');

        return view('companies.index', compact('sections','companies', 'companiesCount','companyInterests', 'majors',
        'communications', 'projects', 'list_title'));
    }
    /**
     * ============================
     * ============================
     */
    public function active()
    {
        $companies = User::where('role_name', 'Company')->where('status',1)->orderBy('id', 'DESC')->paginate(pageCount);

        $companiesCount = User::where([['role_name', 'Company'],['status',1]])->count();

        $sections = SectionMdl::orderBy('id', 'ASC')->get();

        $majors = CompanyMajorMdl::select('id', 'company_id')->get()->countBy('company_id')->all();

        $communications = CommunicationMdl::select('id', 'user_id')->get()->countBy('user_id')->all();

        $projects = CompanyProjectMdl::select('id', 'company_id')->get()->countBy('company_id')->all();

        $list_title = __('general.Active');

        return view('companies.index', compact('sections','companies', 'companiesCount', 'majors', 'communications',
        'projects', 'list_title'));
    }
    /**
     * ============================
     * ============================
     */
    public function inactive()
    {
        $companies = User::where('role_name', 'Company')->where('status',0)->orderBy('id', 'DESC')->paginate(pageCount);

        $companiesCount = User::where([['role_name', 'Company'],['status',0]])->count();

        $sections = SectionMdl::orderBy('id', 'ASC')->get();

        $majors = CompanyMajorMdl::select('id', 'company_id')->get()->countBy('company_id')->all();

        $communications = CommunicationMdl::select('id', 'user_id')->get()->countBy('user_id')->all();

        $projects = CompanyProjectMdl::select('id', 'company_id')->get()->countBy('company_id')->all();

        $list_title = __('general.Inactive');

        return view('companies.index', compact('sections','companies', 'companiesCount', 'majors', 'communications',
        'projects', 'list_title'));
    }
    /**
     * ============================
     * ============================
     */
    public function category($category)
    {
        $category = SectionMdl::find($category);

        //$companies = User::where('role_name', 'Company')->orderBy('id', 'DESC')->paginate(pageCount);

        $companies = CompanyMdl::where('section_id',$category->id)->orderBy('id','DESC')->paginate(pageCount);

        $companiesCount = $companies->count();

        $sections = SectionMdl::orderBy('id', 'ASC')->get();

        $majors = CompanyMajorMdl::select('id', 'company_id')->get()->countBy('company_id')->all();

        $communications = CommunicationMdl::select('id', 'user_id')->get()->countBy('user_id')->all();

        $projects = CompanyProjectMdl::select('id', 'company_id')->get()->countBy('company_id')->all();

        if(App::getLocale()=='ar'){
            $list_title = $category->name_ar;
        }else{
            $list_title = $category->name_en;
        }


        return view('companies.category', compact('sections','companies', 'companiesCount', 'majors', 'communications',
        'projects', 'list_title'));
    }
    /**
     * ============================
     * ============================
     */
    public function create()
    {
        if (App::getLocale() == 'ar') {
            $sections = SectionMdl::where('status', 1)->orderBy('name_ar', 'ASC')->get();

            $majors = MajorMdl::where('status', 1)->orderBy('name_ar', 'ASC')->get();

            $packages = PackageMdl::where('status', 1)->orderBy('name_ar', 'ASC')->get();

            $cities = CityMdl::where('status', 1)->orderBy('name_ar', 'ASC')->get();
        } else {
            $sections = SectionMdl::where('status', 1)->orderBy('name_en', 'ASC')->get();

            $majors = MajorMdl::where('status', 1)->orderBy('name_en', 'ASC')->get();

            $packages = PackageMdl::where('status', 1)->orderBy('name_en', 'ASC')->get();

            $cities = CityMdl::where('status', 1)->orderBy('name_en', 'ASC')->get();
        }

        $came_from = url()->previous();

        return view('companies.create', compact('came_from','sections', 'majors', 'packages', 'cities'));
    }
    /**
     * ============================
     * ============================
     */
    public function store(Request $req)
    {
        $valid = Validator::make($req->all(), [
            'name_ar'    => 'required|string',
            'name_en'    => 'required|string',
            'mail'          => 'required|email|unique:users,email',
            'logo'           => 'required|image|mimes:jpeg,png,jpg,gif',
            'section'       => 'required|integer|exists:sections,id',
            'license'        => 'nullable|mimes:pdf',
            'establish_dt' => 'nullable|date',
            'package'     => 'required|integer|exists:packages,id',
            'city'           => 'required|integer|exists:cities,id',
        ], [
            'name_ar.required' => __('general.Field Is Required'),
            'name_ar.string'    => __('general.Format Not Matching'),

            'name_en.required' => __('general.Field Is Required'),
            'name_en.string'    => __('general.Format Not Matching'),

            'mail.required' => __('general.Field Is Required'),
            'mail.email'    => __('general.Format Not Matching'),
            'mail.unique'   => __('general.This Field Already Exists'),

            'logo.required'     => __('general.Field Is Required'),
            'logo.image'        => __('general.The file you uploaded is Not Image'),
            'logo.mimes'        => __('general.Image formate is not allowed'),

            'section.required' => __('general.Field Is Required'),
            'section.integer'   => __('general.Format Not Matching'),
            'section.exists'     => __('general.This Filed Dosnt Exist'),

            'license.mimes'    => __('general.Accepted PDF Only'),

            'establish_dt.date' => __('general.Format Not Matching'),

            'package.required' => __('general.Field Is Required'),
            'package.integer'   => __('general.Format Not Matching'),
            'package.exists'     => __('general.This Filed Dosnt Exist'),

            'city.required' => __('general.Field Is Required'),
            'city.integer'   => __('general.Format Not Matching'),
            'city.exists'     => __('general.This Filed Dosnt Exist'),
        ]);

        if ($valid->fails()) {
            return back()->withErrors($valid)->withInput($req->all());
        }

        if ($req->hasFile('logo')) {
            $img = $req->file('logo');
            $imgName = rand() . '.' . $img->getClientOriginalExtension();
            //save file like a temp
            $img->move(('imgs/users'), $imgName);
            //RESIZING THE PICTURE AND MAKE A COPY WITH NEW SIZE IN STOREAGE FILE
            $resize = Image::make("imgs/users/{$imgName}")->resize(250, 250)->encode('png');
            Storage::put("public/imgs/users/{$imgName}", $resize->__toString());
            //delete the file as a temp
            File::delete('imgs/users/' . $imgName);
        } else {
            $imgName = null;
        }

        if ($req->hasFile('license')) {
            $img = $req->file('license');
            $fileName = rand() . '.' . $img->getClientOriginalExtension();
            Storage::put("public/imgs/license/{$fileName}", file_get_contents($req->license));
        } else {
            $fileName = null;
        }


        $pas = Str::random(9);

        $user = User::create([
            'name'       => $req->name_en,
            'email'       => $req->mail,
            'role_name' => 'Company',
            'password'  =>  Hash::make($pas),
            'profile_pic' => $imgName,
            'status'      => 0,
            'approval'  => 0,
        ]);

        $user->assignRole('Company');

        CompanyMdl::create([
            'user_id'              => $user->id,
            'package_id'         => $req->package,
            'section_id'           => $req->section,
            'city_id'               => $req->city,
            'name_en'            => $req->name_en,
            'name_ar'            => $req->name_ar,
            'responsible_name' => $req->responsible,
            'position'             => $req->position,
            'license'               => $fileName,
            'address'             => $req->address,
            'lat'                    => $req->lat,
            'lng'                    => $req->lng,
        ]);

        CommunicationMdl::create([
            'user_id'    => $user->id,
            'con_type' => 11,
            'chanel'    => $user->email,
        ]);

        Alert()->success(__('general.Record Added Successfully'));
        //return back();
        return redirect(url($req->cameFrom));
    }
    /**
     * ============================
     * ============================
     */
    public function show(CompanyMdl $company)
    {
        $company::find($company);

        $majors = $company->company_has_major;

        $communications = CommunicationMdl::where('user_id', $company->user_id)->get();

        return view('companies.show', compact('company', 'majors', 'communications'));
    }
    /**
     * ============================
     * ============================
     */
    public function edit(CompanyMdl $company)
    {
        $company::find($company);

        $user = User::find($company->user_id);

        if (App::getLocale() == 'ar') {
            $sections = SectionMdl::where('status', 1)->orderBy('name_ar', 'ASC')->get();

            $packages = PackageMdl::where('status', 1)->orderBy('name_ar', 'ASC')->get();

            $cities = CityMdl::where('status', 1)->orderBy('name_ar', 'ASC')->get();
        } else {
            $sections = SectionMdl::where('status', 1)->orderBy('name_en', 'ASC')->get();

            $packages = PackageMdl::where('status', 1)->orderBy('name_en', 'ASC')->get();

            $cities = CityMdl::where('status', 1)->orderBy('name_en', 'ASC')->get();
        }

        return view('companies.edit', compact('company', 'user', 'sections', 'packages', 'cities'));
    }
    /**
     * ============================
     * ============================
     */
    public function update(Request $req)
    {
        $valid = Validator::make($req->all(), [
            'company_id' => 'required|integer|exists:companies,id',
            'user_id'      => 'required|integer|exists:users,id',
            'name_ar'    => 'required|string',
            'name_en'    => 'required|string',
            'mail'          => 'required|email|unique:users,email,' . $req->user_id . '',
            'logo'           => 'nullable|image|mimes:jpeg,png,jpg,gif',
            'section'       => 'required|integer|exists:sections,id',
            'license'        => 'nullable|mimes:pdf',
            'establish_dt' => 'nullable|date',
            'package'     => 'required|integer|exists:packages,id',
            'city'           => 'required|integer|exists:cities,id',
        ], [
            'company_id.required' => __('general.Cant complete Your Request Now'),
            'company_id.integer'   => __('general.Cant complete Your Request Now'),
            'company_id.exists'     => __('general.Cant complete Your Request Now'),

            'name_ar.required' => __('general.Field Is Required'),
            'name_ar.string'    => __('general.Format Not Matching'),

            'name_en.required' => __('general.Field Is Required'),
            'name_en.string'    => __('general.Format Not Matching'),

            'mail.required' => __('general.Field Is Required'),
            'mail.email'    => __('general.Format Not Matching'),
            'mail.unique'   => __('general.This Field Already Exists'),

            'logo.image'        => __('general.The file you uploaded is Not Image'),
            'logo.mimes'        => __('general.Image formate is not allowed'),

            'section.required' => __('general.Field Is Required'),
            'section.integer'   => __('general.Format Not Matching'),
            'section.exists'     => __('general.This Filed Dosnt Exist'),

            'license.mimes'    => __('general.Accepted PDF Only'),

            'establish_dt.date' => __('general.Format Not Matching'),

            'package.required' => __('general.Field Is Required'),
            'package.integer'   => __('general.Format Not Matching'),
            'package.exists'     => __('general.This Filed Dosnt Exist'),

            'city.required' => __('general.Field Is Required'),
            'city.integer'   => __('general.Format Not Matching'),
            'city.exists'     => __('general.This Filed Dosnt Exist'),
        ]);

        if ($valid->fails()) {
            return back()->withErrors($valid)->withInput($req->all());
        }

        if ($req->hasFile('logo')) {
            $img = $req->file('logo');
            $imgName = rand() . '.' . $img->getClientOriginalExtension();
            //save file like a temp
            $img->move(('imgs/users'), $imgName);
            //RESIZING THE PICTURE AND MAKE A COPY WITH NEW SIZE IN STOREAGE FILE
            $resize = Image::make("imgs/users/{$imgName}")->resize(250, 250)->encode('png');
            Storage::put("public/imgs/users/{$imgName}", $resize->__toString());
            //delete the file as a temp
            File::delete('imgs/users/' . $imgName);
            File::delete('storage/app/public/imgs/users/' . $req->oldLogo);
        } else {
            $imgName = $req->oldLogo;
        }

        if ($req->hasFile('license')) {
            $img = $req->file('license');
            $fileName = rand() . '.' . $img->getClientOriginalExtension();
            Storage::put("public/imgs/license/{$fileName}", file_get_contents($req->license));
            File::delete('storage/app/public/imgs/license/' . $req->old_license);
        } else {
            $fileName = $req->old_license;
        }

        $company = CompanyMdl::findOrFail($req->company_id);

        $user = User::findOrFail($req->user_id);

        $user->name       = $req->name_en;
        $user->email       = $req->mail;
        $user->profile_pic = $imgName;
        $user->save();

        $company->package_id             = $req->package;
        $company->section_id              = $req->section;
        $company->city_id                  = $req->city;
        $company->name_en               = $req->name_en;
        $company->name_ar               = $req->name_ar;
        $company->responsible_name    = $req->responsible;
        $company->position                = $req->position;
        $company->license                  = $fileName;
        $company->address                 = $req->address;
        $company->lat                        = $req->lat;
        $company->lng                        = $req->lng;
        $company->save();

        Alert()->success(__('general.Record Updated Successfully'));
        return back();
    }
    /**
     * ============================
     * ============================
     */
    public function featured(Request $req)
    {
        $valid = Validator::make($req->all(), [
            'sectionID' => 'required|integer|exists:companies,id'
        ]);

        if ($valid->fails()) {
            Alert()->error(__('general.Cant complete Your Request Now'));
            return back();
        }

        $company = CompanyMdl::findOrFail($req->sectionID);

        $company->featured = 1;
        $company->save();

        Alert()->success(__('general.Record Activated Successfully'));
        return back();
    }
    /**
     * ============================
     * ============================
     */
    public function normalize(Request $req)
    {
        $valid = Validator::make($req->all(), [
            'sectionID' => 'required|integer|exists:companies,id'
        ]);

        if ($valid->fails()) {
            Alert()->error(__('general.Cant complete Your Request Now'));
            return back();
        }

        $company = CompanyMdl::findOrFail($req->sectionID);

        $company->featured = 0;
        $company->save();

        Alert()->success(__('general.Record Deactivated Successfully'));
        return back();
    }
    /**
     * ============================
     * ============================
     */
    public function activate(Request $req)
    {
        $valid = Validator::make($req->all(), [
            'sectionID' => 'required|integer|exists:companies,id'
        ]);

        if ($valid->fails()) {
            Alert()->error(__('general.Cant complete Your Request Now'));
            return back();
        }

        $company = CompanyMdl::findOrFail($req->sectionID);

        $company->status = 1;
        $company->save();

        $user = User::find($company->user_id);
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
            'sectionID' => 'required|integer|exists:companies,id'
        ]);

        if ($valid->fails()) {
            Alert()->error(__('general.Cant complete Your Request Now'));
            return back();
        }

        $company = CompanyMdl::findOrFail($req->sectionID);

        $company->status = 0;
        $company->save();

        $user = User::find($company->user_id);
        $user->status = 0;
        $user->save();

        Alert()->success(__('general.Record Deactivated Successfully'));
        return back();
    }
    /**
     * ============================
     * ============================
     */
    public function about($company)
    {
        $company = CompanyMdl::find($company);

        return view('companies.about', compact('company'));
    }
    /**
     * ============================
     * ============================
     */
    public function aboutUpdate(Request $req)
    {
        $valid = Validator::make($req->all(), [
            'company' => 'required|integer|exists:companies,id',
            'about_ar' => 'required|string',
            'about_en' => 'required|string',
        ], [
            'company.required' => __('general.Cant complete Your Request Now'),
            'company.integer'  => __('general.Cant complete Your Request Now'),
            'company.exists'    => __('general.Cant complete Your Request Now'),

            'about_ar.required' => __('general.Field Is Required'),
            'about_ar.string' => __('general.Format Not Matching'),

            'about_en.required' => __('general.Field Is Required'),
            'about_en.string' => __('general.Format Not Matching'),
        ]);

        if ($valid->fails()) {
            return back()->withErrors($valid)->withInput($req->all());
        }

        $company = CompanyMdl::findOrFail($req->company);

        $company->bio_en = $req->about_en;
        $company->bio_ar = $req->about_ar;
        $company->save();

        Alert()->success(__('general.Record Updated Successfully'));
        return back();
    }
    /**
     * ============================
     * ============================
     */
    public function majors(CompanyMdl $company)
    {
        $company::find($company);

        $majors = MajorMdl::where('section_id', $company->section_id)->get();

        $companyMajors = CompanyMajorMdl::where('company_id', $company->id)->select('company_id', 'major_id')->get()->pluck('company_id', 'major_id')->all();

        return view('companies.majors', compact('company', 'majors', 'companyMajors'));
    }
    /**
     * ============================
     * ============================
     */
    public function majorUpdate(Request $req)
    {
        $valid = Validator::make($req->all(), [
            'company_id' => 'required|integer|exists:companies,id',
        ]);

        if ($valid->fails()) {
            Alert()->error(__('general.Cant complete Your Request Now'));
            return back();
        }

        $company = CompanyMdl::findOrFail($req->company_id);

        $company->company_has_major()->sync($req->major);

        Alert()->success(__('general.Record Updated Successfully'));

        return back();
    }
    /**
     * ============================
     * ============================
     */
    public function changePass(Request $req)
    {
        $valid = Validator::make($req->all(), [
            'companyID' => 'required|integer|exists:companies,id',
            'password' => 'required|confirmed|string'
        ]);

        if ($valid->fails()) {
            Alert()->error(__('general.Cant complete Your Request Now'));
            return back();
        }

        $company = CompanyMdl::findOrFail($req->companyID);

        $user = User::findOrFail($company->user_id);

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
            'companyID' => 'required|integer|exists:companies,id'
        ]);

        if ($valid->fails()) {
            Alert()->error(__('general.Cant complete Your Request Now'));
            return back();
        }

        $company = CompanyMdl::findOrFail($req->companyID);

        $user = User::findOrFail($company->user_id);

        $userConns = CommunicationMdl::where('user_id', $user->id)->get();
        if ($userConns->count() > 0) {
            foreach ($userConns as $con) {
                $con->forceDelete();
            }
        }

        $oldProjects = OldProjectMdl::where('user_id', $user->id)->get();

        if ($oldProjects->count() > 0) {
            foreach ($oldProjects as $oProject) {
                $photos = OldProjectPhotoMdl::where('old_project_id', $oProject->id)->get();
                foreach ($photos as $photo) {
                    $photo->forceDelete();
                }
                $oProject->delete();
            }
        }

        $products = ProductMdl::where('user_id', $user->id)->get();

        if ($products->count() > 0) {
            foreach ($products as $product) {
                $productPhotos = ProductPhotoMdl::where('product_id', $product->id)->get();
                foreach ($productPhotos as $productPhoto) {
                    $productPhoto->forceDelete();
                }
                $product->delete();
            }
        }

        $sliders = CompanySliderMdl::where('user_id', $user->id)->get();

        if ($sliders->count() > 0) {
            foreach ($sliders as $slider) {
                $slider->delete();
            }
        }

        $jobs = JobMdl::where('user_id', $user->id)->get();

        if ($jobs->count() > 0) {
            foreach ($jobs as $job) {
                $job->delete();
            }
        }

        $orders = OrderMdl::where('user_id', $user->id)->get();

        if ($orders->count() > 0) {
            foreach ($orders as $order) {
                $order->delete();
            }
        }

        $subscriptions = SubscriptionMdl::where('user_id', $user->id)->get();

        if ($subscriptions->count() > 0) {
            foreach ($subscriptions as $subscription) {
                $subscription->delete();
            }
        }

        $companyProjects = CompanyProjectMdl::where('company_id',$company->id);
        if($companyProjects->count()>0){
            foreach($companyProjects as $project){
                $project->delete();
            }
        }

        $company->delete();
        $user->delete();

        Alert()->success(__('general.Record Deleted Successfully'));
        return back();
    }
    /**
     * ============================
     * ============================
     */
}

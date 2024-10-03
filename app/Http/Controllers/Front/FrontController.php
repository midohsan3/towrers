<?php

namespace App\Http\Controllers\Front;

use App\Models\User;
use App\Models\CvMdl;
use App\Models\JobMdl;
use App\Models\NewsMdl;
use App\Models\MajorMdl;
use App\Models\OrderMdl;
use App\Models\VideoMdl;
use App\Models\CompanyMdl;
use App\Models\ProductMdl;
use App\Models\ProjectMdl;
use App\Models\SectionMdl;
use App\Mail\CompanyEnquiry;
use Illuminate\Http\Request;
use App\Models\ClassifiedMdl;
use App\Models\OldProjectMdl;
use App\Models\SingleVideoMdl;
use Illuminate\Support\Carbon;
use App\Models\CompanyMajorMdl;
use App\Models\ProductPhotoMdl;
use App\Models\ProjectPhotoMdl;
use App\Models\CommunicationMdl;
use App\Models\CompanySliderMdl;
use App\Mail\OwnerCompanyEnquiry;
use App\Models\OldProjectPhotoMdl;
use App\Models\ProductCategoryMdl;
use App\Models\ProjectCategoryMdl;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class FrontController extends Controller
{

    /**
     * ============================
     * ============================
     */
    public function index()
    {
        return redirect()->route('front.main');
    }

    /**
     * ============================
     * ============================
     */
    public function main()
    {


        $single_video = VideoMdl::inRandomOrder()->limit(1)->first();

        $secondRowAd = ClassifiedMdl::where([['size_id', 3], ['status', 1]])->inRandomOrder()->limit(10)->get();

        $wVideo = ClassifiedMdl::where([['size_id', 4], ['status', 1]])->inRandomOrder()->limit(2)->get();

        $specialForYouAd = ClassifiedMdl::where([['size_id', 5], ['status', 1]])->inRandomOrder()->limit(10)->get();

        $projects = ProjectMdl::where([['status', 1], ['featured', 1]])->inRandomOrder()->limit(6)->get();

        $consultants = CompanyMdl::where([['status', 1], ['featured', 1], ['section_id', 1]])->inRandomOrder()->limit(4)->get();

        $contractors = CompanyMdl::where([['status', 1], ['featured', 1], ['section_id', 2]])->inRandomOrder()->limit(4)->get();

        $subcontractors = CompanyMdl::where([['status', 1], ['featured', 1], ['section_id', 3]])->inRandomOrder()->limit(4)->get();

        $suppliers = CompanyMdl::where([['status', 1], ['featured', 1], ['section_id', 4]])->inRandomOrder()->limit(4)->get();

        $buildingMaterials = CompanyMdl::where([['status', 1], ['featured', 1], ['section_id', 5]])->inRandomOrder()->limit(4)->get();

        $realestates = CompanyMdl::where([['status', 1], ['featured', 1], ['section_id', 6]])->inRandomOrder()->limit(4)->get();

        $designers = CompanyMdl::where([['status', 1], ['featured', 1], ['section_id', 7]])->inRandomOrder()->limit(4)->get();

        $conns = CommunicationMdl::whereIn('con_type', [1, 3, 6, 11])->orderBy('con_type', 'ASC')->get();

        $adVideo = SingleVideoMdl::first();

        $videos = VideoMdl::where('featured', 1)->inRandomOrder()->limit(3)->get();

        $jobs = jobMdl::where('status', 1)->inRandomOrder()->limit(4)->get();

        $cvs = CvMdl::where('status', 1)->inRandomOrder()->limit(4)->get();

        $products = ProductMdl::where('featured', 1)->limit(10)->get();

        return view('front.main', compact('single_video', 'secondRowAd', 'wVideo', 'adVideo', 'specialForYouAd', 'projects', 'consultants', 'contractors', 'subcontractors', 'suppliers', 'buildingMaterials', 'realestates', 'designers', 'conns', 'videos', 'jobs', 'cvs', 'products'));
    }
    /**
     * ============================
     * ============================
     */
    public function companies()
    {
        if (App::getLocale() == 'ar') {
            $companies = CompanyMdl::where([['status', 1]])->orderBy('name_ar', 'ASC')->paginate(pageCount);
        } else {
            $companies = CompanyMdl::where([['status', 1]])->orderBy('name_en', 'ASC')->paginate(pageCount);
        }
        $conns = CommunicationMdl::whereIn('con_type', [1, 3, 6, 11])->orderBy('con_type', 'ASC')->get();

        return view('front.companies', compact('companies', 'conns'));
    }
    /**
     * ============================
     * ============================
     */
    public function companiesBySection($section)
    {
        $section = SectionMdl::find($section);

        $majors = MaJorMdl::where([['section_id', $section->id], ['status', 1]])->get();

        if (App::getLocale() == 'ar') {
            $companies = CompanyMdl::where([['status', 1], ['section_id', $section->id]])->orderBy('name_ar', 'ASC')->paginate(pageCount);
        } else {
            $companies = CompanyMdl::where([['status', 1], ['section_id', $section->id]])->orderBy('name_en', 'ASC')->paginate(pageCount);
        }
        //$MajorCompanies = CompanyMajorMdl::where('major_id', $section->id)->get()->pluck('major_id', 'company_id')->all();

        $conns = CommunicationMdl::whereIn('con_type', [1, 3, 6, 11])->orderBy('con_type', 'ASC')->get();

        return view('front.companiesBySection', compact('section', 'majors', 'companies', 'conns'));
    }
    /**
     * ============================
     * ============================
     */
    public function companiesByMajors($section, $major)
    {

        $section = SectionMdl::find($section);

        $sectionMajors = MajorMdl::where([['status', 1], ['section_id', $section->id]])->get();

        $major = MajorMdl::find($major);

        $MajorCompanies = CompanyMajorMdl::where('major_id', $major->id)->get()->pluck( 'company_id')->all();

        if (App::getLocale() == 'ar') {
            $companies = CompanyMdl::where([['status', 1],])->whereIn('id',$MajorCompanies)->orderBy('name_ar',
            'ASC')->paginate(pageCount);
        } else {
            $companies = CompanyMdl::where([['status', 1]])->whereIn('id',$MajorCompanies)->orderBy('name_en',
            'ASC')->paginate(pageCount);
        }

        $conns = CommunicationMdl::whereIn('con_type', [1, 3, 6, 11])->orderBy('con_type', 'ASC')->get();


        return view('front.companiesByMajor', compact('major', 'section', 'sectionMajors', 'MajorCompanies', 'companies', 'conns'));
    }
    /**
     * ============================
     * ============================
     */
    public function singleCompany($company)
    {
        $company = CompanyMdl::find($company);

        $company->views = $company->views + 3;
        $company->save();

        $sliders = CompanySliderMdl::where('user_id', $company->user_id)->orWhereNull('user_id')->get();

        $products = ProductMdl::where('user_id', $company->user_id)->inRandomOrder()->limit(6)->get();

        $majors = $company->company_has_major;

        $communications = CommunicationMdl::where('user_id', $company->user_id)->get();

        $projects = $company->company_has_projects;

        $oldProjects = OldProjectMdl::where('user_id', $company->user_id)->orderBy('id', 'DESC')->get();

        $projectsCount = $company->company_has_projects->count();

        $oldProjectsCount = OldProjectMdl::where('user_id', $company->user_id)->count();

        $totalProjects = intval($projectsCount + $oldProjectsCount);

        $productsCount = ProductMdl::where('user_id', $company->user_id)->count();

        return view('front.company', compact('company', 'sliders', 'products', 'majors', 'communications', 'projects', 'oldProjects', 'totalProjects', 'productsCount'));
    }
    /**
     * ============================
     * ============================
     */
    public function orderStore(Request $req)
    {
        $valid = Validator::make($req->all(), [
            'user_id' => 'required|integer|exists:users,id',
            'name' => 'required|string|min:3',
            'email' => 'required|email',
            'phone' => 'required|numeric',
            'details' => 'required|string|min:10',
        ], [
            'user_id.required' => __('general.Cant complete Your Request Now'),
            'user_id.integer'  => __('general.Cant complete Your Request Now'),
            'user_id.exists'    => __('general.Cant complete Your Request Now'),

            'name.required' => __('general.Field Is Required'),
            'name.string'    => __('general.Format Not Matching'),
            'name.min'      => __('general.Text Too Short'),

            'email.required' => __('general.Field Is Required'),
            'email.email'    => __('general.Format Not Matching'),

            'phone.required' => __('general.Field Is Required'),
            'phone.numeric'    => __('general.Format Not Matching'),

            'details.required' => __('general.Field Is Required'),
            'details.string'    => __('general.Format Not Matching'),
            'details.min'      => __('general.Text Too Short'),
        ]);

        if ($valid->fails()) {
            return back()->withErrors($valid)->withInput($req->all());
        }
        $user = User::find($req->user_id);

        $order = OrderMdl::create([
            'user_id'     => $req->user_id,
            'product_id' => $req->product,
            'name'        => $req->name,
            'phone'       => $req->phone,
            'email'        => $req->email,
            'subject'      => 'Company' . $user->companyUser->name_en,
            'details'      => $req->details,
            'status'       => 0,
        ]);
        $data = ['company' => $user->companyUser->name_en, 'subject' => $order->subject];
        // Mail::to($req->email)->send(new CompanyEnquiry($data));

        //Mail::to('info@towersuae.ae')->send(new OwnerCompanyEnquiry($data));

        Alert()->success(__('front.Your Enquiry Send Successfully'));
        return back();
    }
    /**
     * ============================
     * ============================
     */
    public function companySingleOldProject($old_project)
    {
        $old_project = OldProjectMdl::find($old_project);

        return view('front.oldProject', compact('old_project'));
    }
    /**
     * ============================
     * ============================
     */
    public function companySingleOldProjectGlary($old_project)
    {
        $old_project = OldProjectMdl::find($old_project);
        $photos = OldProjectPhotoMdl::where('old_project_id', $old_project->id)->get();
        return view('front.oldProjectGalry', compact('old_project', 'photos'));
    }
    /**
     * ============================
     * ============================
     */
    public function projects()
    {
        if (App::getLocale() == 'ar') {
            $projects = ProjectMdl::where([['status', 1]])->orderBy('name_ar', 'ASc')->paginate(16);
        } else {
            $projects = ProjectMdl::where([['status', 1]])->orderBy('name_en', 'ASc')->paginate(16);
        }

        return view('front.projects', compact('projects'));
    }
    /**
     * ============================
     * ============================
     */
    public function projectsByCategory($category)
    {
        $category = ProjectCategoryMdl::find($category);

        if (App::getLocale() == 'ar') {
            $projects = ProjectMdl::where([['status', 1], ['project_category_id', $category->id]])->orderBy('name_ar', 'ASc')->paginate(pageCount);
        } else {
            $projects = ProjectMdl::where([['status', 1], ['project_category_id', $category->id]])->orderBy('name_en', 'ASc')->paginate(pageCount);
        }

        return view('front.projectsByCategory', compact('category', 'projects'));
    }
    /**
     * ============================
     * ============================
     */
    public function project($project)
    {
        $project =ProjectMdl::findOrFail($project);

        $photos = ProjectPhotoMdl::where('project_id', $project->id)->get();

        $companies = $project->project_has_companies;

        $recommended = ProjectMdl::where([['project_category_id', $project->project_category_id], ['status', 1]])->inRandomOrder()->limit(4)->get();

        $secondRowAd = ClassifiedMdl::where([['size_id', 3], ['status', 1]])->inRandomOrder()->limit(10)->get();

        if(Auth::check()){
            $read_notify =
            DB::table('notifications')->where('data->project_id',$project->id)->where('notifiable_id',Auth::user()->id)->pluck('id')->all();
            if(!empty($read_notify)){
                DB::table('notifications')->where('id',$read_notify)->Update(['read_at'=>Carbon::now()]);
            }
        }

        return view('front.project', compact('project', 'photos', 'companies', 'recommended', 'secondRowAd'));
    }
    /**
     * ============================
     * ============================
     */
    public function jobs()
    {
        $jobs = JobMdl::where('status', 1)->orderBy('id', 'DESC')->paginate(pageCount);

        if(Auth::check()){
            $read_notify =
            DB::table('notifications')->whereNotNull('data->job_id')->where('notifiable_id',Auth::user()->id)->first('id');
            if($read_notify){
                DB::table('notifications')->where('id',$read_notify->id)->Update(['read_at'=>Carbon::now()]);
            }
        }
        return view('front.jobs', compact('jobs'));
    }
    /**
     * ============================
     * ============================
     */
    public function jobsByCategory($category)
    {
        $jobs = JobMdl::where([['status', 1], ['job_category_id', $category]])->orderBy('id', 'DESC')->paginate(pageCount);
        return view('front.jobs', compact('jobs'));
    }
    /**
     * ============================
     * ============================
     */
    public function singleJob($job)
    {
        $job = JobMdl::find($job);

        return view('front.jobSingle', compact('job'));
    }
    /**
     * ============================
     * ============================
     */
    public function cvs()
    {
        $jobs = CvMdl::where('status', 1)->orderBy('id', 'DESC')->paginate(pageCount);
        return view('front.cvs', compact('jobs'));
    }
    /**
     * ============================
     * ============================
     */
    public function cvsByCategory($category)
    {
        $jobs = CvMdl::where([['status', 1], ['job_category_id', $category]])->orderBy('id', 'DESC')->paginate(pageCount);
        return view('front.cvs', compact('jobs'));
    }
    /**
     * ============================
     * ============================
     */
    public function videosGallery()
    {
        $videos = VideoMdl::orderBy('id', 'DESC')->paginate(pageCount);
        return view('front.video_gallery', compact('videos'));
    }
    /**
     * ============================
     * ============================
     */
    public function products()
    {
        $products = ProductMdl::orderBy('id', 'DESC')->paginate(pageCount);

        $photos = ProductPhotoMdl::orderby('product_id', 'ASC')->get();

        return view('front.products', compact('products', 'photos'));
    }
    /**
     * ============================
     * ============================
     */
    public function productsByCategory($category)
    {
        $category = ProductCategoryMdl::find($category);

        $products = ProductMdl::where('product_category_id', $category->id)->orderBy('id', 'DESC')->paginate(pageCount);

        $photos = ProductPhotoMdl::orderby('product_id', 'ASC')->get();

        return view('front.productsByCategory', compact('category', 'products', 'photos'));
    }
    /**
     * ============================
     * ============================
     */
    public function singleProduct($product)
    {
        $product =ProductMdl::findOrFail($product);

        $photos = ProductPhotoMdl::where('product_id', $product->id)->get();

        $cons = CommunicationMdl::whereIn('con_type', [1, 3])->get();

        $recommended = ProductMdl::where('product_category_id', $product->product_category_id)->inRandomOrder()->limit(4)->get();


        if(Auth::check()){
            $read_notify =
            DB::table('notifications')->where('data->product_id',$product->id)->where('notifiable_id',Auth::user()->id)->pluck('id')->all();
            if($read_notify){
                DB::table('notifications')->where('id',$read_notify)->Update(['read_at'=>Carbon::now()]);
            }
        }

        return view('front.product', compact('product', 'photos', 'cons', 'recommended'));
    }
    /**
     * ============================
     * ============================
     */
    public function productEnquiry(Request $req)
    {
        $valid = Validator::make($req->all(), [
            'product_id' => 'required|integer|exists:products,id',
            'name' => 'required|string|min:3',
            'email' => 'required|email',
            'phone' => 'required|numeric',
            'details' => 'required|string|min:10',
        ], [
            'product_id.required' => __('general.Cant complete Your Request Now'),
            'product_id.integer'  => __('general.Cant complete Your Request Now'),
            'product_id.exists'    => __('general.Cant complete Your Request Now'),

            'name.required' => __('general.Field Is Required'),
            'name.string'    => __('general.Format Not Matching'),
            'name.min'      => __('general.Text Too Short'),

            'email.required' => __('general.Field Is Required'),
            'email.email'    => __('general.Format Not Matching'),

            'phone.required' => __('general.Field Is Required'),
            'phone.numeric'    => __('general.Format Not Matching'),

            'details.required' => __('general.Field Is Required'),
            'details.string'    => __('general.Format Not Matching'),
            'details.min'      => __('general.Text Too Short'),
        ]);

        if ($valid->fails()) {
            return back()->withErrors($valid)->withInput($req->all());
        }

        $product = ProductMdl::find($req->product_id);

        $order = OrderMdl::create([
            'user_id'     => $product->user_id,
            'product_id' => $product->id,
            'name'        => $req->name,
            'phone'       => $req->phone,
            'email'        => $req->email,
            'subject'      => 'Product' . $product->name_en,
            'details'      => $req->details,
            'status'       => 0,
        ]);
        $data = ['company' => $product->name_en, 'subject' => $order->subject];
        //Mail::to($req->email)->send(new CompanyEnquiry($data));

        //Mail::to('info@towersuae.ae')->send(new OwnerCompanyEnquiry($data));

        Alert()->success(__('front.Your Enquiry Send Successfully'));
        return back();
    }
    /**
     * ============================
     * ============================
     */
    public function videos()
    {
        $videos = VideoMdl::orderBy('id', 'DESC')->paginate(pageCount);

        return view('front.videos', compact('videos'));
    }
    /**
     * ============================
     * ============================
     */
    public function chooseAd()
    {
        return view('front.chooseAd');
    }
    /**
     * ============================
     * ============================
     */
}
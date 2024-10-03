<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Models\MajorMdl;
use App\Models\OrderMdl;
use App\Models\CompanyMdl;
use App\Models\ProductMdl;
use App\Models\SectionMdl;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use App\Models\OldProjectMdl;
use App\Models\CompanyMajorMdl;
use App\Models\CommunicationMdl;
use App\Models\CompanySliderMdl;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class CompanyPCotroller extends Controller
{
    /*
    ===================
    ===================
    */
    public function index()
    {
        $companies = CompanyMdl::with('userCompany')->where([['status', 1]])->orderBy('id', 'DESC')->paginate(pageCount);
        if ($companies->count() > 0) {
            return json_encode(array('status' => 'success', 'data' => $companies));
        } else {
            return json_encode(array('status' => 'fail'));
        }
    }

    /*
    ===================
    ===================
    */

    public function categories()
    {
        $categories= SectionMdl::where('status', 1)->orderBy('id', 'DESC')->get();
        if ($categories->count() > 0) {
            return json_encode(array('status' => 'success', 'data' => $categories));
        } else {
            return json_encode(array('status' => 'fail'));
        }
    }
    /*
    ===================
    ===================
    */
    public function majors(){
      $majors = MajorMdl::where('status', 1)->orderBy('id', 'ASC')->get();
      if ($majors->count() > 0) {
            return json_encode(array('status' => 'success', 'data' => $majors));
        } else {
            return json_encode(array('status' => 'fail'));
        }
    }
    /*
    ===================
    ===================
    */

    public function category($id)
    {
        $companies = CompanyMdl::with('userCompany')->where([['status', 1],['section_id',$id]])->orderBy('id',
        'DESC')->paginate(pageCount);
        if ($companies->count() > 0) {
            return json_encode(array('status' => 'success', 'data' => $companies));
        } else {
            return json_encode(array('status' => 'fail'));
        }
    }
    /*
    ===================
    ===================
    */
    public function companyMajor($category,$major)
    {
      $section = SectionMdl::find($category);

      if(empty($section)){
          return json_encode(array('status' => 'fail'));
      }

      $major = MajorMdl::find($major);

      $MajorCompanies = CompanyMajorMdl::where('major_id', $major->id)->get()->pluck('company_id')->all();

      if(empty($major)){
        return json_encode(array('status' => 'fail'));
      }

      $companies = CompanyMdl::with('userCompany')->where([['status',
      1],])->whereIn('id',$MajorCompanies)->paginate(pageCount);

      if ($companies->count() > 0) {
          return json_encode(array('status' => 'success', 'data' => $companies));
      } elseif(empty($companies)) {
          return json_encode(array('status' => 'empty'));
      }else{
          return json_encode(array('status' => 'fail'));
      }
    }
    /*
    ===================
    ===================
    */
    public function singleCompany($id)
    {
      $company_add = CompanyMdl::find($id);

      $company_add->views +=3;
      $company_add->save();

      $company = CompanyMdl::with('userCompany')->find($id);

      if ($company->count() > 0) {
            return json_encode(array('status' => 'success', 'data' => $company));
        } else {
            return json_encode(array('status' => 'fail'));
        }
    }
    /*
    ===================
    ===================
    */
    public function sliders($id)
    {
      $company = CompanyMdl::find($id);

      $sliders = CompanySliderMdl::where('user_id', $company->user_id)->orWhereNull('user_id')->get();

      if ($sliders->count() > 0) {
            return json_encode(array('status' => 'success', 'data' => $sliders));
        } else {
            return json_encode(array('status' => 'fail'));
        }
    }
    /*
    ===================
    ===================
    */
   public function projectsCount($id){
    $company = CompanyMdl::find($id);

    $projectsCount = $company->company_has_projects->count();

    if($projectsCount){
            return json_encode(array('status' => 'success', 'data' => $projectsCount));
    } else {
        return json_encode(array('status' => 'fail'));
    }
   }
    /*
    ===================
    ===================
    */
    public function products($id)
    {
      $company = CompanyMdl::find($id);

      $products = ProductMdl::where('user_id', $company->user_id)->inRandomOrder()->limit(6)->get();

      if ($products->count() > 0) {
            return json_encode(array('status' => 'success', 'data' => $products));
        } else {
            return json_encode(array('status' => 'fail'));
        }
    }
    /*
    ===================
    ===================
    */
    public function contacts($id)
    {
      $company = CompanyMdl::find($id);

      $contacts = CommunicationMdl::where('user_id', $company->user_id)->get();

      if ($contacts->count() > 0) {
            return json_encode(array('status' => 'success', 'data' => $contacts));
        } else {
            return json_encode(array('status' => 'fail'));
        }
    }
    /*
    ===================
    ===================
    */
    public function projects($id)
    {
      $company = CompanyMdl::find($id);

      $projects = $company->company_has_projects;

      if ($projects->count() > 0) {
            return json_encode(array('status' => 'success', 'data' => $projects));
        } else {
            return json_encode(array('status' => 'fail'));
        }
    }
    /*
    ===================
    ===================
    */
    public function oldProjects($id)
    {
      $company = CompanyMdl::find($id);

      $oldProjects = OldProjectMdl::where('user_id', $company->user_id)->orderBy('id', 'DESC')->get();

      if ($oldProjects->count() > 0) {
            return json_encode(array('status' => 'success', 'data' => $oldProjects));
        } else {
            return json_encode(array('status' => 'fail'));
        }
    }
    /*
    ===================
    ===================
    */
    public function companySingleOldProject($old_project){
        $old_project = OldProjectMdl::find($old_project);

        if ($old_project->count() > 0) {
            return json_encode(array('status' => 'success', 'data' => $old_project));
        } else {
            return json_encode(array('status' => 'fail'));
        }
    }
    /*
    ===================
    ===================
    */

    public function consultants()
    {
        $companies = CompanyMdl::with('userCompany')->where([['status', 1], ['section_id', 1]])->orderBy('id',
        'DESC')->paginate(pageCount);
        if ($companies->count() > 0) {
            return json_encode(array('status' => 'success', 'data' => $companies));
        } else {
            return json_encode(array('status' => 'fail'));
        }
    }

    /*
    ===================
    ===================
    */


    public function contractors()
    {
        $companies = CompanyMdl::with('userCompany')->where([['status', 1], ['section_id', 2]])->orderBy('id',
        'DESC')->paginate(pageCount);
        if ($companies->count() > 0) {
            return json_encode(array('status' => 'success', 'data' => $companies));
        } else {
            return json_encode(array('status' => 'fail'));
        }
    }
    /*
    ===================
    ===================
    */
    public function subContractors()
    {
        $companies = CompanyMdl::with('userCompany')->where([['status', 1], ['section_id', 3]])->orderBy('id',
        'DESC')->paginate(pageCount);
        if ($companies->count() > 0) {
            return json_encode(array('status' => 'success', 'data' => $companies));
        } else {
            return json_encode(array('status' => 'fail'));
        }
    }
    /*
    ===================
    ===================
    */
    public function suppliers()
    {
        $companies = CompanyMdl::with('userCompany')->where([['status', 1], ['section_id', 4]])->orderBy('id',
        'DESC')->paginate(pageCount);
        if ($companies->count() > 0) {
            return json_encode(array('status' => 'success', 'data' => $companies));
        } else {
            return json_encode(array('status' => 'fail'));
        }
    }
    /*
    ===================
    ===================
    */
    public function bMaterials()
    {
        $companies = CompanyMdl::with('userCompany')->where([['status', 1], ['section_id', 5]])->orderBy('id',
        'DESC')->paginate(pageCount);
        if ($companies->count() > 0) {
            return json_encode(array('status' => 'success', 'data' => $companies));
        } else {
            return json_encode(array('status' => 'fail'));
        }
    }
    /*
    ===================
    ===================
    */
    public function realestate()
    {
        $companies = CompanyMdl::with('userCompany')->where([['status', 1], ['section_id', 6]])->orderBy('id',
        'DESC')->paginate(pageCount);
        if ($companies->count() > 0) {
            return json_encode(array('status' => 'success', 'data' => $companies));
        } else {
            return json_encode(array('status' => 'fail'));
        }
    }
    /*
    ===================
    ===================
    */
    public function decor()
    {
        $companies = CompanyMdl::with('userCompany')->where([['status', 1], ['section_id', 7]])->orderBy('id',
        'DESC')->paginate(pageCount);
        if ($companies->count() > 0) {
            return json_encode(array('status' => 'success', 'data' => $companies));
        } else {
            return json_encode(array('status' => 'fail'));
        }
    }
    /*
    ===================
    ===================
    */
    public function communications(){
        $communications = CommunicationMdl::whereIn('con_type', [1, 3, 6, 11])->orderBy('con_type', 'ASC')->get();

        if ($communications->count() > 0) {
            return json_encode(array('status' => 'success', 'data' => $communications));
        } else {
            return json_encode(array('status' => 'fail'));
        }
    }

    /*
    ===================
    ===================
    */
    public function relatedProjects($id){

        $company = CompanyMdl::find($id);

        if(empty($company)){
            return json_encode(array('status'=>'no company'));
        }

        $projects = $company->company_has_projects;

        if ($projects->count() > 0) {
            return json_encode(array('status' => 'success', 'data' => $projects));
        } else {
            return json_encode(array('status' => 'fail'));
        }
    }
    /*
    ===================
    ===================
    */
    public function inquire(Request $req){
        $valid = Validator::make($req->all(), [
            'user_id' => 'required|integer|exists:users,id',
            'name' => 'required|string|min:3',
            'email' => 'required|email',
            'phone' => 'required|numeric',
            'details' => 'required|string|min:10',
        ], [
        'user_id.required' => __('general.Cant complete Your Request Now'),
        'user_id.integer' => __('general.Cant complete Your Request Now'),
        'user_id.exists' => __('general.Cant complete Your Request Now'),

        'name.required' => __('general.Field Is Required'),
        'name.string' => __('general.Format Not Matching'),
        'name.min' => __('general.Text Too Short'),

        'email.required' => __('general.Field Is Required'),
        'email.email' => __('general.Format Not Matching'),

        'phone.required' => __('general.Field Is Required'),
        'phone.numeric' => __('general.Format Not Matching'),

        'details.required' => __('general.Field Is Required'),
        'details.string' => __('general.Format Not Matching'),
        'details.min' => __('general.Text Too Short'),
        ]);

        if ($valid->fails()) {
            return json_encode(array('status' => 'fail','data'=>null,'errors'=>$valid));
        }

        $user = User::find($req->user_id);

        $order = OrderMdl::create([
        'user_id' => $req->user_id,
        'product_id' => $req->product,
        'name' => $req->name,
        'phone' => $req->phone,
        'email' => $req->email,
        'subject' => 'Company' . $user->companyUser->name_en,
        'details' => $req->details,
        'status' => 0,
        ]);

        if ($order->count() > 0) {
            return json_encode(array('status' => 'success', 'data' => $order));
        } else {
            return json_encode(array('status' => 'fail','data'=>null));
        }
    }
    /*
    ===================
    ===================
    */
}
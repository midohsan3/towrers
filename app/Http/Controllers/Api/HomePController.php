<?php

namespace App\Http\Controllers\Api;

use App\Models\CvMdl;
use App\Models\JobMdl;
use App\Models\NewsMdl;
use App\Models\VideoMdl;
use App\Models\CompanyMdl;
use App\Models\ProductMdl;
use App\Models\ProjectMdl;
use Illuminate\Http\Request;
use App\Models\ClassifiedMdl;
use App\Models\MainSliderMdl;
use App\Models\SingleVideoMdl;
use App\Models\CommunicationMdl;
use App\Http\Controllers\Controller;
use App\Http\Traits\ApiResponseTrait;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\MainSliderResource;

class HomePController extends Controller
{
    use ApiResponseTrait;
    /*
    ===================
    ===================
    */
    public function projectsSearch(Request $req){
        $valid = Validator::make($req->all(), [
            'search_obj' => 'required'
        ], [
            'search_obj.required' => 'No Object To Search'
        ]);

        if ($valid->fails()) {
            return back()->withErrors($valid);
        }

        $projects = ProjectMdl::where('status', 1)->where('name_ar', 'LIKE', "%{$req->search_obj}%")->orWhere('name_en',
        'LIKE', "%{$req->search_obj}%")->get();

        if ($projects->count() > 0) {
            return json_encode(array('status' => 'success', 'data' => $projects));
        }elseif(empty($projects)){
            return json_encode(array('status' => 'empty'));
        } else {
            return json_encode(array('status' => 'fail'));
        }
    }
    /*
    ===================
    ===================
    */
    public function categorySearch(Request $req){
        $valid = Validator::make($req->all(), [
        'search_obj' => 'required',
        //'category' => 'required|exists:categories,id'
        ], [
        'search_obj.required' => 'No Object To Search'
        ]);

        if ($valid->fails()) {
            return back()->withErrors($valid);
        }

        $companies = CompanyMdl::with('userCompany')->where([['status', 1],['name_ar', 'LIKE',
        "%{$req->search_obj}%"]])->orWhere([['status', 1],['name_en', 'LIKE',
        "%{$req->search_obj}%"]])->get();

        if ($companies->count() > 0) {
        return json_encode(array('status' => 'success', 'data' => $companies));
        }elseif(empty($companies)){
        return json_encode(array('status' => 'empty'));
        } else {
        return json_encode(array('status' => 'fail'));
        }
    }
    /*
    ===================
    ===================
    */
    public function consultantsSearch(Request $req){
        $valid = Validator::make($req->all(), [
            'search_obj' => 'required'
        ], [
            'search_obj.required' => 'No Object To Search'
        ]);

        if ($valid->fails()) {
            return back()->withErrors($valid);
        }

        $consultants = CompanyMdl::where([['status', 1], ['section_id', 1],['name_ar', 'LIKE',
        "%{$req->search_obj}%"]])->orWhere([['status', 1], ['section_id', 1],['name_en', 'LIKE',
        "%{$req->search_obj}%"]])->get();

        if ($consultants->count() > 0) {
            return json_encode(array('status' => 'success', 'data' => $consultants));
        }elseif(empty($consultants)){
            return json_encode(array('status' => 'empty'));
        } else {
            return json_encode(array('status' => 'fail'));
        }
    }
    /*
    ===================
    ===================
    */
    public function contractorsSearch(Request $req){
        $valid = Validator::make($req->all(), [
            'search_obj' => 'required'
        ], [
            'search_obj.required' => 'No Object To Search'
        ]);

        if ($valid->fails()) {
            return back()->withErrors($valid);
        }

        $contractors = CompanyMdl::where([['status', 1], ['section_id', 2],['name_ar', 'LIKE',
        "%{$req->search_obj}%"]])->orWhere([['status', 1], ['section_id', 2],['name_en', 'LIKE',
        "%{$req->search_obj}%"]])->get();


        if ($contractors->count() > 0) {
            return json_encode(array('status' => 'success', 'data' => $contractors));
        }elseif(empty($contractors)){
            return json_encode(array('status' => 'empty'));
        } else {
            return json_encode(array('status' => 'fail'));
        }
    }
    /*
    ===================
    ===================
    */
    public function subcontractorsSearch(Request $req){
        $valid = Validator::make($req->all(), [
            'search_obj' => 'required'
        ], [
            'search_obj.required' => 'No Object To Search'
        ]);

        if ($valid->fails()) {
            return back()->withErrors($valid);
        }

        $subcontractors = CompanyMdl::where([['status', 1], ['section_id', 3],['name_ar', 'LIKE',
        "%{$req->search_obj}%"]])->orWhere([['status', 1], ['section_id', 3],['name_en', 'LIKE',
        "%{$req->search_obj}%"]])->get();


        if ($subcontractors->count() > 0) {
            return json_encode(array('status' => 'success', 'data' => $subcontractors));
        }elseif(empty($subcontractors)){
            return json_encode(array('status' => 'empty'));
        } else {
            return json_encode(array('status' => 'fail'));
        }
    }
    /*
    ===================
    ===================
    */
    public function suppliersSearch(Request $req){
        $valid = Validator::make($req->all(), [
            'search_obj' => 'required'
        ], [
            'search_obj.required' => 'No Object To Search'
        ]);

        if ($valid->fails()) {
            return back()->withErrors($valid);
        }

        $suppliers = CompanyMdl::where([['status', 1], ['section_id', 4],['name_ar', 'LIKE',
        "%{$req->search_obj}%"]])->orWhere([['status', 1], ['section_id', 4],['name_en', 'LIKE',
        "%{$req->search_obj}%"]])->get();


        if ($suppliers->count() > 0) {
            return json_encode(array('status' => 'success', 'data' => $suppliers));
        }elseif(empty($suppliers)){
            return json_encode(array('status' => 'empty'));
        } else {
            return json_encode(array('status' => 'fail'));
        }
    }
    /*
    ===================
    ===================
    */
    public function buildingMaterialsSearch(Request $req){
        $valid = Validator::make($req->all(), [
            'search_obj' => 'required'
        ], [
            'search_obj.required' => 'No Object To Search'
        ]);

        if ($valid->fails()) {
            return back()->withErrors($valid);
        }

        $buildingMaterials = CompanyMdl::where([['status', 1], ['section_id', 5],['name_ar', 'LIKE',
        "%{$req->search_obj}%"]])->orWhere([['status', 1], ['section_id', 5],['name_en', 'LIKE',
        "%{$req->search_obj}%"]])->get();


        if ($buildingMaterials->count() > 0) {
            return json_encode(array('status' => 'success', 'data' => $buildingMaterials));
        }elseif(empty($buildingMaterials)){
            return json_encode(array('status' => 'empty'));
        } else {
            return json_encode(array('status' => 'fail'));
        }
    }
    /*
    ===================
    ===================
    */
    public function realestatesSearch(Request $req){
        $valid = Validator::make($req->all(), [
            'search_obj' => 'required'
        ], [
            'search_obj.required' => 'No Object To Search'
        ]);

        if ($valid->fails()) {
            return back()->withErrors($valid);
        }

        $realestates = CompanyMdl::where([['status', 1], ['section_id', 6],['name_ar', 'LIKE',
        "%{$req->search_obj}%"]])->orWhere([['status', 1], ['section_id', 6],['name_en', 'LIKE',
        "%{$req->search_obj}%"]])->get();


        if ($realestates->count() > 0) {
            return json_encode(array('status' => 'success', 'data' => $realestates));
        }elseif(empty($realestates)){
            return json_encode(array('status' => 'empty'));
        } else {
            return json_encode(array('status' => 'fail'));
        }
    }
    /*
    ===================
    ===================
    */
    public function designersSearch(Request $req){
        $valid = Validator::make($req->all(), [
            'search_obj' => 'required'
        ], [
            'search_obj.required' => 'No Object To Search'
        ]);

        if ($valid->fails()) {
            return back()->withErrors($valid);
        }

        $designers = CompanyMdl::where([['status', 1], ['section_id', 7],['name_ar', 'LIKE',
        "%{$req->search_obj}%"]])->orWhere([['status', 1], ['section_id', 7],['name_en', 'LIKE',
        "%{$req->search_obj}%"]])->get();


        if ($designers->count() > 0) {
            return json_encode(array('status' => 'success', 'data' => $designers));
        }elseif(empty($designers)){
            return json_encode(array('status' => 'empty'));
        } else {
            return json_encode(array('status' => 'fail'));
        }
    }
    /*
    ===================
    ===================
    */
    public function jobsSearch(Request $req){
        $valid = Validator::make($req->all(), [
            'search_obj' => 'required'
        ], [
            'search_obj.required' => 'No Object To Search'
        ]);

        if ($valid->fails()) {
            return back()->withErrors($valid);
        }

        $jobs = JobMdl::where('status', 1)->where('name_ar', 'LIKE', "%{$req->search_obj}%")->orWhere('name_en', 'LIKE', "%{$req->search_obj}%")->get();


        if ($jobs->count() > 0) {
            return json_encode(array('status' => 'success', 'data' => $jobs));
        }elseif(empty($jobs)){
            return json_encode(array('status' => 'empty'));
        } else {
            return json_encode(array('status' => 'fail'));
        }
    }
    /*
    ===================
    ===================
    */
    public function cvsSearch(Request $req){
        $valid = Validator::make($req->all(), [
            'search_obj' => 'required'
        ], [
            'search_obj.required' => 'No Object To Search'
        ]);

        if ($valid->fails()) {
            return back()->withErrors($valid);
        }

        $cvs = CvMdl::where('status', 1)->where('description_ar', 'LIKE', "%{$req->search_obj}%")->orWhere('description_en', 'LIKE', "%{$req->search_obj}%")->get();


        if ($cvs->count() > 0) {
            return json_encode(array('status' => 'success', 'data' => $cvs));
        }elseif(empty($cvs)){
            return json_encode(array('status' => 'empty'));
        } else {
            return json_encode(array('status' => 'fail'));
        }
    }
    /*
    ===================
    ===================
    */
    public function productsSearch(Request $req){
        $valid = Validator::make($req->all(), [
            'search_obj' => 'required'
        ], [
            'search_obj.required' => 'No Object To Search'
        ]);

        if ($valid->fails()) {
            return back()->withErrors($valid);
        }

        $products = ProductMdl::where('name_ar', 'LIKE', "%{$req->search_obj}%")->orWhere('name_en', 'LIKE', "%{$req->search_obj}%")->get();


        if ($products->count() > 0) {
            return json_encode(array('status' => 'success', 'data' => $products));
        }elseif(empty($products)){
            return json_encode(array('status' => 'empty'));
        } else {
            return json_encode(array('status' => 'fail'));
        }
    }
    /*
    ===================
    ===================
    */
    public function mainSlider()
    {
        $mainSlider =MainSliderMdl::where('status', 1)->orderBy('id', 'DESC')->get();


        if ($mainSlider->count() > 0) {
            return json_encode(array('status' => 'success', 'data' => $mainSlider));
        } else {
            return json_encode(array('status' => 'fail'));
        }
    }
    /*
    ===================
    ===================
    */
    public function newsBar(){

        $news_bar =NewsMdl::orderBy('id', 'DESC')->get();

        if ($news_bar->count() > 0) {
            return json_encode(array('status' => 'success', 'data' => $news_bar));
        } else {
            return json_encode(array('status' => 'fail'));
        }


    }

    /*
    ===================
    ===================
    */
    public function topAds(){

        $top_adds =ClassifiedMdl::where([['size_id', 3], ['status', 1]])->inRandomOrder()->limit(10)->get();

        if ($top_adds->count() > 0) {
            return json_encode(array('status' => 'success', 'data' => $top_adds));
        } else {
            return json_encode(array('status' => 'fail'));
        }


    }
    /*
    ===================
    ===================
    */
    public function projects()
    {
       $projects = ProjectMdl::where([['status', 1], ['featured', 1]])->inRandomOrder()->limit(6)->get();

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
    public function consultants()
    {
       $consultants = CompanyMdl::with('userCompany')->where([['status', 1], ['featured', 1], ['section_id', 1]])->inRandomOrder()->limit(4)->get();

       if ($consultants->count() > 0) {
            return json_encode(array('status' => 'success', 'data' => $consultants));
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
       $contractors = CompanyMdl::with('userCompany')->where([['status', 1], ['featured', 1], ['section_id', 2]])->inRandomOrder()->limit(4)->get();


       if ($contractors->count() > 0) {
            return json_encode(array('status' => 'success', 'data' => $contractors));
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
       $subcontractors = CompanyMdl::with('userCompany')->where([['status', 1], ['featured', 1], ['section_id', 3]])->inRandomOrder()->limit(4)->get();


       if ($subcontractors->count() > 0) {
            return json_encode(array('status' => 'success', 'data' => $subcontractors));
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
       $suppliers = CompanyMdl::with('userCompany')->where([['status', 1], ['featured', 1], ['section_id', 4]])->inRandomOrder()->limit(4)->get();


       if ($suppliers->count() > 0) {
            return json_encode(array('status' => 'success', 'data' => $suppliers));
        } else {
            return json_encode(array('status' => 'fail'));
        }

    }
    /*
    ===================
    ===================
    */
    public function wVideo()
    {
       $wVideo = ClassifiedMdl::where([['size_id', 4], ['status', 1]])->inRandomOrder()->limit(2)->get();


       if ($wVideo->count() > 0) {
            return json_encode(array('status' => 'success', 'data' => $wVideo));
        } else {
            return json_encode(array('status' => 'fail'));
        }

    }
    /*
    ===================
    ===================
    */
    public function singleVideo()
    {
      $adVideo = SingleVideoMdl::first();


       if ($adVideo->count() > 0) {
            return json_encode(array('status' => 'success', 'data' => $adVideo));
        } else {
            return json_encode(array('status' => 'fail'));
        }

    }
    /*
    ===================
    ===================
    */
     public function buildingMaterials()
    {
      $buildingMaterials = CompanyMdl::with('userCompany')->where([['status', 1], ['featured', 1], ['section_id', 5]])->inRandomOrder()->limit(4)->get();

       if ($buildingMaterials->count() > 0) {
            return json_encode(array('status' => 'success', 'data' => $buildingMaterials));
        } else {
            return json_encode(array('status' => 'fail'));
        }

    }
    /*
    ===================
    ===================
    */
    public function RealEstate()
    {
      $realestates = CompanyMdl::with('userCompany')->where([['status', 1], ['featured', 1], ['section_id', 6]])->inRandomOrder()->limit(4)->get();


       if ($realestates->count() > 0) {
            return json_encode(array('status' => 'success', 'data' => $realestates));
        } else {
            return json_encode(array('status' => 'fail'));
        }

    }
    /*
    ===================
    ===================
    */
    public function singleAdd()
    {
      $specialForYouAd = ClassifiedMdl::where([['size_id', 5], ['status', 1]])->inRandomOrder()->limit(10)->get();


       if ($specialForYouAd->count() > 0) {
            return json_encode(array('status' => 'success', 'data' => $specialForYouAd));
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
       $designers = CompanyMdl::with('userCompany')->where([['status', 1], ['featured', 1], ['section_id', 7]])->inRandomOrder()->limit(4)->get();


       if ($designers->count() > 0) {
            return json_encode(array('status' => 'success', 'data' => $designers));
        } else {
            return json_encode(array('status' => 'fail'));
        }

    }
    /*
    ===================
    ===================
    */
    public function jobs()
    {
       $jobs = jobMdl::where('status', 1)->inRandomOrder()->limit(4)->get();


       if ($jobs->count() > 0) {
            return json_encode(array('status' => 'success', 'data' => $jobs));
        } else {
            return json_encode(array('status' => 'fail'));
        }

    }
    /*
    ===================
    ===================
    */
    public function cvs()
    {
       $cvs = CvMdl::where('status', 1)->inRandomOrder()->limit(4)->get();


       if ($cvs->count() > 0) {
            return json_encode(array('status' => 'success', 'data' => $cvs));
        } else {
            return json_encode(array('status' => 'fail'));
        }

    }
    /*
    ===================
    ===================
    */
     public function products()
    {
       $products = ProductMdl::where('featured', 1)->limit(10)->get();


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

}
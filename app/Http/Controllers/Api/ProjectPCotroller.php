<?php

namespace App\Http\Controllers\Api;

use App\Models\CompanyMdl;
use App\Models\ProjectMdl;
use Illuminate\Http\Request;
use App\Models\ProjectPhotoMdl;
use App\Models\CompanyProjectMdl;
use App\Models\ProjectCategoryMdl;
use App\Http\Controllers\Controller;

class ProjectPCotroller extends Controller
{
    /*
    ===================
    ===================
    */
    public function index()
    {
        $projects = ProjectMdl::where([['status', 1]])->orderBy('id', 'DESC')->paginate(pageCount);

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
    public function categories(){
        $category = ProjectCategoryMdl::where('status',1)->get();

         if ($category->count() > 0) {
         return json_encode(array('status' => 'success', 'data' => $category));

         }elseif(empty($category)){
         return json_encode(array('status' => 'empty'));

         } else {
         return json_encode(array('status' => 'fail'));

         }
    }
    /*
    ===================
    ===================
    */
    public function category($category){

        $category = ProjectCategoryMdl::find($category);

        if(empty($category)){
            return json_encode(array('status' => 'fail'));
        }

        $projects = ProjectMdl::where([['status', 1], ['project_category_id', $category->id]])->paginate(pageCount);

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
    public function single($projectId)
    {
        $project = ProjectMdl::find($projectId);

        if (empty($project)) {
            return json_encode(array('status' => 'empty'));

        }elseif($project->count() > 0){

            return json_encode(array('status' => 'success', 'data' => $project));

        } else {
        return json_encode(array('status' => 'fail'));
        }
    }
    /*
    ===================
    ===================
    */
    public function photos($projectId)
    {

        $project = ProjectMdl::find($projectId);

        if(empty($project)){

            return json_encode(array('status' => 'fail'));

        }

        $photos = ProjectPhotoMdl::where('project_id', $project->id)->get();

        if (empty($photos)) {
            return json_encode(array('status' => 'empty'));

        }elseif($photos->count() > 0){

            return json_encode(array('status' => 'success', 'data' => $photos));

        } else {
            return json_encode(array('status' => 'fail'));
        }
    }
    /*
    ===================
    ===================
    */
    public function recommended($projectId)
    {

        $project = ProjectMdl::find($projectId);

        if(empty($project)){

            return json_encode(array('status' => 'fail'));

        }

        $recommended = ProjectMdl::where([['project_category_id', $project->project_category_id], ['status',
        1]])->inRandomOrder()->limit(4)->get();

        if (empty($recommended)) {
            return json_encode(array('status' => 'empty'));

        }elseif($recommended->count() > 0){

            return json_encode(array('status' => 'success', 'data' => $recommended));

        } else {
            return json_encode(array('status' => 'fail'));
        }
    }
    /*
    ===================
    ===================
    */
    public function companiesByProject($projectId){
        $project = ProjectMdl::find($projectId);

        //$project_companies = $project->project_has_companies;

        $project_companies =
        CompanyProjectMdl::select('company_id')->where('project_id',$project->id)->get()->pluck('company_id')->all();

        $companies = CompanyMdl::with('userCompany')->whereIn('id',$project_companies)->get();

        if (empty($companies)) {
        return json_encode(array('status' => 'empty'));

        }elseif($companies->count() > 0){

        return json_encode(array('status' => 'success', 'data' => $companies));

        } else {
        return json_encode(array('status' => 'fail'));
        }
    }
    /*
    ===================
    ===================
    */
}
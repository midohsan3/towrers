<?php

namespace App\Http\Controllers\Api;

use App\Models\JobMdl;
use Illuminate\Http\Request;
use App\Models\JobCategoryMdl;
use App\Http\Controllers\Controller;

class JopPController extends Controller
{

    /*
    ===================
    ===================
    */
    public function index()
    {
        $jobs = JobMdl::where([['status', 1]])->orderBy('id', 'DESC')->paginate(pageCount);
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
    public function categories()
    {
        $categories = JobCategoryMdl::where('status', 1)->get();
        if ($categories->count() > 0) {
        return json_encode(array('status' => 'success', 'data' => $categories));
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
    public function category($category)
    {
        $jobs = JobMdl::where([['status', 1], ['job_category_id', $category]])->orderBy('id',
        'DESC')->paginate(pageCount);
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
    public function single($job)
    {
        $job = JobMdl::find($job);
        if ($job->count() > 0) {
        return json_encode(array('status' => 'success', 'data' => $job));
        }elseif(empty($job)){
        return json_encode(array('status' => 'empty'));
        } else {
        return json_encode(array('status' => 'fail'));
        }
    }
    /*
    ===================
    ===================
    */
    public function accountant()
    {
        $jobs = JobMdl::where([['status', 1], ['job_category_id', 2]])->orderBy('id', 'DESC')->get();
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
    public function doctor()
    {
        $jobs = JobMdl::where([['status', 1], ['job_category_id', 5]])->orderBy('id', 'DESC')->get();
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
    public function eng()
    {
        $jobs = JobMdl::where([['status', 1], ['job_category_id', 1]])->orderBy('id', 'DESC')->get();
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
    public function forman()
    {
        $jobs = JobMdl::where([['status', 1], ['job_category_id', 6]])->orderBy('id', 'DESC')->get();
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
    public function labor()
    {
        $jobs = JobMdl::where([['status', 1], ['job_category_id', 3]])->orderBy('id', 'DESC')->get();
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
    public function sales()
    {
        $jobs = JobMdl::where([['status', 1], ['job_category_id', 4]])->orderBy('id', 'DESC')->get();
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
}

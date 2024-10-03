<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\CvMdl;
use Illuminate\Http\Request;

class CVPController extends Controller
{

    /*
    ===================
    ===================
    */
    public function index()
    {
        $cvs = CvMdl::where([['status', 1]])->orderBy('id', 'DESC')->paginate(pageCount);
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
    public function category($category)
    {
        $cvs = CvMdl::where([['status', 1], ['job_category_id', $category]])->orderBy('id',
        'DESC')->paginate(pageCount);

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
    public function accountant()
    {
        $jobs = CvMdl::where([['status', 1], ['job_category_id', 2]])->orderBy('id', 'DESC')->get();
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
        $jobs = CvMdl::where([['status', 1], ['job_category_id', 5]])->orderBy('id', 'DESC')->get();
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
        $jobs = CvMdl::where([['status', 1], ['job_category_id', 1]])->orderBy('id', 'DESC')->get();
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
        $jobs = CvMdl::where([['status', 1], ['job_category_id', 6]])->orderBy('id', 'DESC')->get();
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
        $jobs = CvMdl::where([['status', 1], ['job_category_id', 3]])->orderBy('id', 'DESC')->get();
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
        $jobs = CvMdl::where([['status', 1], ['job_category_id', 4]])->orderBy('id', 'DESC')->get();
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

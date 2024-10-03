<?php

namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use App\Http\Traits\ApiResponseTrait;
use Illuminate\Http\Request;
use App\Models\VideoMdl;

class RealsPController extends Controller
{
    use ApiResponseTrait;
    /*
    ===================
    ===================
    */
    public function index()
    {
        $reals = VideoMdl::orderBy('id', 'DESC')->get();
        

        if ($reals->count() > 0) {
            return json_encode(array('status' => 'success', 'data' => $reals));
        } else {
            return json_encode(array('status' => 'fail'));
        }
    }
     /*
    ===================
    ===================
    */
}

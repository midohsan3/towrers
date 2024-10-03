<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\CityMdl;
use Illuminate\Http\Request;

class CityController extends Controller
{
    public function index(){
        $cities = CityMdl::where('status',1)->get();
        if ($cities->count() > 0) {
        return json_encode(array('status' => 'success', 'data' => $cities));
        } elseif(empty($companies)) {
        return json_encode(array('status' => 'empty'));
        }else{
        return json_encode(array('status' => 'fail'));
        }
    }
}
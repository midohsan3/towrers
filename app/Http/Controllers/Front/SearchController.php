<?php

namespace App\Http\Controllers\Front;

use App\Models\CvMdl;
use App\Models\CompanyMdl;
use App\Models\ProductMdl;
use App\Models\ProjectMdl;
use Illuminate\Http\Request;
use App\Models\CommunicationMdl;
use App\Http\Controllers\Controller;
use App\Models\JobMdl;
use Illuminate\Support\Facades\Validator;

class SearchController extends Controller
{
    public function index(Request $req)
    {
        $valid = Validator::make($req->all(), [
            'search_obj' => 'required'
        ], [
            'search_obj.required' => 'No Object To Search'
        ]);

        if ($valid->fails()) {
            return back()->withErrors($valid);
        }

        $projects = ProjectMdl::where('status', 1)->where('name_ar', 'LIKE', "%{$req->search_obj}%")->orWhere('name_en', 'LIKE', "%{$req->search_obj}%")->get();

        $consultants = CompanyMdl::where([['status', 1], ['section_id', 1],['name_ar', 'LIKE', "%{$req->search_obj}%"]])->orWhere([['status', 1], ['section_id', 1],['name_en', 'LIKE', "%{$req->search_obj}%"]])->get();

        $contractors = CompanyMdl::where([['status', 1], ['section_id', 2],['name_ar', 'LIKE', "%{$req->search_obj}%"]])->orWhere([['status', 1], ['section_id', 2],['name_en', 'LIKE', "%{$req->search_obj}%"]])->get();

        $subcontractors = CompanyMdl::where([['status', 1], ['section_id', 3],['name_ar', 'LIKE', "%{$req->search_obj}%"]])->orWhere([['status', 1], ['section_id', 3],['name_en', 'LIKE', "%{$req->search_obj}%"]])->get();

        $suppliers = CompanyMdl::where([['status', 1], ['section_id', 4],['name_ar', 'LIKE', "%{$req->search_obj}%"]])->orWhere([['status', 1], ['section_id', 4],['name_en', 'LIKE', "%{$req->search_obj}%"]])->get();

        $buildingMaterials = CompanyMdl::where([['status', 1], ['section_id', 5],['name_ar', 'LIKE', "%{$req->search_obj}%"]])->orWhere([['status', 1], ['section_id', 5],['name_en', 'LIKE', "%{$req->search_obj}%"]])->get();

        $realestates = CompanyMdl::where([['status', 1], ['section_id', 6],['name_ar', 'LIKE', "%{$req->search_obj}%"]])->orWhere([['status', 1], ['section_id', 6],['name_en', 'LIKE', "%{$req->search_obj}%"]])->get();

        $designers = CompanyMdl::where([['status', 1], ['section_id', 7],['name_ar', 'LIKE', "%{$req->search_obj}%"]])->orWhere([['status', 1], ['section_id', 7],['name_en', 'LIKE', "%{$req->search_obj}%"]])->get();

        $conns = CommunicationMdl::whereIn('con_type', [1, 3, 6, 11])->orderBy('con_type', 'ASC')->get();

        $jobs = JobMdl::where('status', 1)->where('name_ar', 'LIKE', "%{$req->search_obj}%")->orWhere('name_en', 'LIKE', "%{$req->search_obj}%")->get();

        $cvs = CvMdl::where('status', 1)->where('description_ar', 'LIKE', "%{$req->search_obj}%")->orWhere('description_en', 'LIKE', "%{$req->search_obj}%")->get();

        $products = ProductMdl::where('name_ar', 'LIKE', "%{$req->search_obj}%")->orWhere('name_en', 'LIKE', "%{$req->search_obj}%")->get();



        return view(
            'front.search',
            compact('projects', 'consultants', 'contractors', 'subcontractors', 'suppliers', 'buildingMaterials', 'realestates', 'designers', 'conns', 'jobs', 'cvs', 'products')
        );
    }
}

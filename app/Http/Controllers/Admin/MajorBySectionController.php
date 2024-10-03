<?php

namespace App\Http\Controllers\Admin;

use App\Models\MajorMdl;
use App\Models\SectionMdl;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;

class MajorBySectionController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

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
    public function index($section)
    {
        $section = SectionMdl::find($section);

        if (App::getLocale() == 'ar') {
            $majors = MajorMdl::where('section_id', $section->id)->orderBy('name_ar', 'ASC')->paginate(pageCount);
        } else {
            $majors = MajorMdl::where('section_id', $section->id)->orderBy('name_en', 'ASC')->paginate(pageCount);
        }

        $majorsCount = MajorMdl::where('section_id', $section->id)->count();

        $list_title = __('general.All');

        return view('majorsBySection.index', compact('section', 'majors', 'majorsCount', 'list_title'));
    }
    /**
     * ============================
     * ============================
     */
}

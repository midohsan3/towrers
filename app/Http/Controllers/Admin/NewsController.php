<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\NewsMdl;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class NewsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('permission:news-bar-list', ['only' => ['index']]);
        $this->middleware('permission:news-bar-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:news-bar-edit', ['only' => ['edit', 'update']]);

        $this->middleware('permission:news-bar-delete', ['only' => ['destroy']]);

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
    public function index()
    {

        $articles = NewsMdl::orderBy('id', 'DESC')->paginate(pageCount);

        $articlesCount = NewsMdl::count();

        return view('news.index', compact('articles', 'articlesCount'));
    }
    /**
     * ============================
     * ============================
     */
    public function create()
    {
        return view('news.create');
    }
    /**
     * ============================
     * ============================
     */
    public function store(Request $req)
    {
        $valid = Validator::make($req->all(), [
            'name_ar' => 'required|string',
            'name_en' => 'required|string',
        ], [
            'name_ar.required' => __('general.Field Is Required'),
            'name_ar.string'    => __('general.Format Not Matchings'),

            'name_en.required' => __('general.Field Is Required'),
            'name_en.string'    => __('general.Format Not Matchings'),
        ]);

        if ($valid->fails()) {
            return back()->withErrors($valid)->withInput($req->all());
        }

        NewsMdl::create([
            'text_en' => $req->name_en,
            'text_ar' => $req->name_ar,
            'link'     => $req->link,
        ]);

        Alert()->success(__('general.Record Added Successfully'));
        return redirect()->route('news.index');
    }
    /**
     * ============================
     * ============================
     */
    public function edit(NewsMdl $news)
    {
        $news::find($news);

        return view('news.edit', compact('news'));
    }
    /**
     * ============================
     * ============================
     */
    public function update(Request $req)
    {
        $valid = Validator::make($req->all(), [
            'news_id' => 'required|integer|exists:news_bars,id',
            'name_ar' => 'required|string',
            'name_en' => 'required|string',
        ], [
            'news_id.required' => __('general.Cant complete Your Request Now'),
            'news_id.integer'  => __('general.Cant complete Your Request Now'),
            'news_id.exists'    => __('general.Cant complete Your Request Now'),

            'name_ar.required' => __('general.Field Is Required'),
            'name_ar.string'    => __('general.Format Not Matchings'),

            'name_en.required' => __('general.Field Is Required'),
            'name_en.string'    => __('general.Format Not Matchings'),
        ]);

        if ($valid->fails()) {
            return back()->withErrors($valid)->withInput($req->all());
        }

        $news = NewsMdl::findOrFail($req->news_id);

        $news->text_en = $req->name_en;
        $news->text_ar = $req->name_ar;
        $news->link = $req->link;
        $news->save();

        Alert()->success(__('general.Record Updated Successfully'));
        return back();
    }
    /**
     * ============================
     * ============================
     */
    public function destroy(Request $req)
    {
        $valid = Validator::make($req->all(), [
            'newsID' => 'required|integer|exists:news_bars,id'
        ]);

        if ($valid->fails()) {
            Alert()->error(__('general.Cant complete Your Request Now'));
            return back();
        }

        $news = NewsMdl::findOrFail($req->newsID);

        $news->forceDelete();

        Alert()->success(__('general.Record Deleted Successfully'));
        return back();
    }
    /**
     * ============================
     * ============================
     */
}

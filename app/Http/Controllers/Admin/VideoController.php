<?php

namespace App\Http\Controllers\Admin;

use App\Models\VideoMdl;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class VideoController extends Controller
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
    public function index()
    {
        $videos = VideoMdl::orderBy('id', 'DESC')->paginate(pageCount);

        $videosCount = VideoMdl::count();

        return view('videos.index', compact('videos', 'videosCount'));
    }
    /**
     * ============================
     * ============================
     */
    public function create()
    {
        return view('videos.create');
    }
    /**
     * ============================
     * ============================
     */
    public function store(Request $req)
    {
        $valid = Validator::make($req->all(), [
            'link' => 'nullable|url',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            'video' => 'required|file|mimes:mp4',
        ], [
            //'link.required' => __('general.Field Is Required'),
            'link.url'      => __('general.Format Not Matching'),

            'photo.image'   => __('general.The file you uploaded is Not Image'),
            'photo.mimes'   => __('general.Image formate is not allowed'),

            'video.required' => __('general.Field Is Required'),
            'video.mimes'    => __('general.Image formate is not allowed'),
        ]);

        if ($valid->fails()) {
            return back()->withErrors($valid)->withInput($req->all());
        }

        if ($req->hasFile('photo')) {
            $img = $req->file('photo');
            $imgName = rand() . '.' . $img->getClientOriginalExtension();
            //save file like a temp
            $img->move(('imgs/videos'), $imgName);
            //RESIZING THE PICTURE AND MAKE A COPY WITH NEW SIZE IN STOREAGE FILE
            $resize = Image::make("imgs/videos/{$imgName}")->encode('png');
            //->resize(350, 250)
            Storage::put("public/imgs/videos/{$imgName}", $resize->__toString());
            //delete the file as a temp
            File::delete('imgs/videos/' . $imgName);
        } else {
            $imgName = null;
        }

        if ($req->hasFile('video')) {
            $img = $req->file('video');
            $videoName = rand() . '.' . $img->getClientOriginalExtension();
            //save file like a temp
            $img->move(('storage/app/public/imgs/videos'), $videoName);
            //RESIZING THE PICTURE AND MAKE A COPY WITH NEW SIZE IN STOREAGE FILE
            //$resize = Image::make("imgs/videos/{$imgName}")->encode('png');
            //->resize(350, 250)
            //Storage::put("public/imgs/videos/{$videoName}", $resize->__toString());
            //delete the file as a temp
            //File::delete('imgs/videos/' . $imgName);
        } else {
            $videoName = null;
        }

        VideoMdl::create([
            'link' => $req->link,
            'cover' => $imgName,
            'video' => $videoName,
            'description_ar' => $req->description_ar,
            'description_en' => $req->description_en,
        ]);

        Alert()->success(__('general.Record Added Successfully'));
        return redirect()->route('video.index');
    }
    /**
     * ============================
     * ============================
     */
    public function edit(VideoMdl $video)
    {
        $video::find($video);

        return view('videos.edit', compact('video'));
    }
    /**
     * ============================
     * ============================
     */
    public function update(Request $req)
    {

        $valid = Validator::make($req->all(), [
            'video_id' => 'required|integer|exists:videos,id',
            'link' => 'required|url',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            'video' => 'required|file|mimes:video/mp4',
        ], [
            'video_id.required' => __('general.Cant complete Your Request Now'),
            'video_id.integer'  => __('general.Cant complete Your Request Now'),
            'video_id.exists'    => __('general.Cant complete Your Request Now'),

            'link.required' => __('general.Field Is Required'),
            'link.url'        => __('general.Format Not Matching'),

            'photo.image'        => __('general.The file you uploaded is Not Image'),
            'photo.mimes'       => __('general.Image formate is not allowed'),

            'video.required'    => __('general.Field Is Required'),
            'video.mimes'       => __('general.Image formate is not allowed'),
        ]);

        if ($valid->fails()) {
            return back()->withErrors($valid)->withInput($req->all());
        }

        if ($req->hasFile('photo')) {
            $img = $req->file('photo');
            $imgName = rand() . '.' . $img->getClientOriginalExtension();
            //save file like a temp
            $img->move(('storage/public/imgs/videos'), $imgName);
            //RESIZING THE PICTURE AND MAKE A COPY WITH NEW SIZE IN STOREAGE FILE
            //$resize = Image::make("imgs/videos/{$imgName}")->resize(350, 250)->encode('png');
            //Storage::put("public/imgs/videos/{$imgName}", $resize->__toString());
            //delete the file as a temp
            //File::delete('imgs/videos/' . $imgName);
        } else {
            $imgName = $req->oldPhoto;
        }

        if ($req->hasFile('video')) {
            $img = $req->file('video');
            $imgName = rand() . '.' . $img->getClientOriginalExtension();
            //save file like a temp
            $img->move(('storage/public/imgs/videos'), $imgName);
            //RESIZING THE PICTURE AND MAKE A COPY WITH NEW SIZE IN STOREAGE FILE
            //$resize = Image::make("imgs/videos/{$imgName}")->resize(350, 250)->encode('png');
            //Storage::put("public/imgs/videos/{$imgName}", $resize->__toString());
            //delete the file as a temp
            //File::delete('imgs/videos/' . $imgName);
        } else {
            $imgName = $req->oldPhoto;
        }

        $video = VideoMdl::findOrFail($req->video_id);

        $video->link           = $req->link;
        $video->cover          = $imgName;
        $video->cover          = $imgName;
        $video->description_ar = $req->description_ar;
        $video->description_en = $req->description_en;
        $video->save();

        Alert()->success(__('general.Record Updated Successfully'));
        return back();
    }
    /**
     * ============================
     * ============================
     */
    public function featured(VideoMdl $video)
    {
        $video::find($video);

        $video->featured = 1;
        $video->save();

        Alert()->success(__('general.Record Updated Successfully'));
        return back();
    }
    /**
     * ============================
     * ============================
     */
    public function normalize(VideoMdl $video)
    {
        $video::find($video);

        $video->featured = 0;
        $video->save();

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
            'videoID' => 'required|integer|exists:videos,id'
        ]);

        if ($valid->fails()) {
            Alert()->error(__('general.Cant complete Your Request Now'));
            return back();
        }

        $video = VideoMdl::findOrFail($req->videoID);

        $video->delete();

        Alert()->success(__('general.Record Deleted Successfully'));
        return back();
    }
    /**
     * ============================
     * ============================
     */
}

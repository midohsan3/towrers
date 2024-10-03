<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\SingleVideoMdl;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class SingleVideoController extends Controller
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
        $video = SingleVideoMdl::first();
        return view('videos.single', compact('video'));
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
        ], [
            'video_id.required' => __('general.Cant complete Your Request Now'),
            'video_id.integer'  => __('general.Cant complete Your Request Now'),
            'video_id.exists'    => __('general.Cant complete Your Request Now'),

            'link.required' => __('general.Field Is Required'),
            'link.url'        => __('general.Format Not Matching'),

            'photo.image'        => __('general.The file you uploaded is Not Image'),
            'photo.mimes'       => __('general.Image formate is not allowed'),
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
            $resize = Image::make("imgs/videos/{$imgName}")->resize(770, 442)->encode('png');
            Storage::put("public/imgs/videos/{$imgName}", $resize->__toString());
            //delete the file as a temp
            File::delete('imgs/videos/' . $imgName);
        } else {
            $imgName = $req->oldPhoto;
        }

        $video = SingleVideoMdl::findOrFail($req->video_id);

        $video->link = $req->link;
        $video->cover = $imgName;
        $video->save();

        Alert()->success(__('general.Record Updated Successfully'));
        return back();
    }
    /**
     * ============================
     * ============================
     */
}

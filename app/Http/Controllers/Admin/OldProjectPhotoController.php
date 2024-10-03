<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\OldProjectMdl;
use App\Models\OldProjectPhotoMdl;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class OldProjectPhotoController extends Controller
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
    public function index($project)
    {
        $project = OldProjectMdl::find($project);

        $photos = OldProjectPhotoMdl::where('old_project_id', $project->id)->get();

        $photosCount = OldProjectPhotoMdl::where('old_project_id', $project->id)->count();

        return view('oldProjects.glary', compact('project', 'photos', 'photosCount'));
    }
    /**
     * ============================
     * ============================
     */
    public function store(Request $req)
    {
        $valid = Validator::make($req->all(), [
            'project_id' => 'required|integer|exists:old_projects,id',
            'photo'      =>  'required|image|mimes:jpeg,png,jpg,gif',
        ], [
            'project_id.required' => __('general.Cant complete Your Request Now'),
            'project_id.integer'  => __('general.Cant complete Your Request Now'),
            'project_id.exists'    => __('general.Cant complete Your Request Now'),

            'photo.required'     => __('general.Field Is Required'),
            'photo.image'        => __('general.The file you uploaded is Not Image'),
            'photo.mimes'       => __('general.Image formate is not allowed'),
        ]);

        if ($valid->fails()) {
            return back()->withErrors($valid);
        }

        if ($req->hasFile('photo')) {
            $img = $req->file('photo');
            $imgName = rand() . '.' . $img->getClientOriginalExtension();
            //save file like a temp
            $img->move(('imgs/projects'), $imgName);
            //RESIZING THE PICTURE AND MAKE A COPY WITH NEW SIZE IN STOREAGE FILE
            $resize = Image::make("imgs/projects/{$imgName}")->resize(450, 675)->encode('png');
            Storage::put("public/imgs/projects/{$imgName}", $resize->__toString());
            //delete the file as a temp
            File::delete('imgs/projects/' . $imgName);
        } else {
            $imgName = null;
        }

        $photos = OldProjectPhotoMdl::where('old_project_id', $req->project_id)->get();

        foreach ($photos as $photo) {
            $photo->status = 0;
            $photo->save();
        }

        OldProjectPhotoMdl::create([
            'old_project_id' => $req->project_id,
            'photo' => $imgName,
        ]);

        $project = OldProjectMdl::find($req->project_id);

        $project->main_pic = $imgName;
        $project->save();

        Alert()->success(__('general.Record Added Successfully'));
        return back();
    }
    /**
     * ============================
     * ============================
     */
    public function activate($photo)
    {
        $photo = OldProjectPhotoMdl::find($photo);

        $photos = OldProjectPhotoMdl::where('old_project_id', $photo->old_project_id)->get();

        foreach ($photos as $oldPhoto) {
            $oldPhoto->status = 0;
            $oldPhoto->save();
        }

        $photo->status = 1;
        $photo->save();

        $project = OldProjectMdl::find($photo->old_project_id);

        $project->main_pic = $photo->photo;
        $project->save();

        Alert()->success(__('general.Record Updated Successfully'));
        return back();
    }
    /**
     * ============================
     * ============================
     */
    public function destroy($photo)
    {
        $photo = OldProjectPhotoMdl::find($photo);

        $project = OldProjectMdl::find($photo->old_project_id);

        if ($project->main_pic == $photo->photo) {

            $project->main_pic = null;
            $project->save();
        }

        $photo->forceDelete();

        if ($project->main_pic == null) {
            $lastPhoto = OldProjectPhotoMdl::where('old_project_id', $project->id)->orderBy('id', 'DESC')->first();

            $lastPhoto->status = 1;
            $lastPhoto->save();

            $project->main_pic = $lastPhoto->photo;
            $project->save();
        }

        Alert()->success(__('general.Record Deleted Successfully'));
        return back();
    }
    /**
     * ============================
     * ============================
     */
}

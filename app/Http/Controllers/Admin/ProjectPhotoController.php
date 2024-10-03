<?php

namespace App\Http\Controllers\Admin;

use App\Models\ProjectMdl;
use Illuminate\Http\Request;
use App\Models\ProjectPhotoMdl;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ProjectPhotoController extends Controller
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
        $project = ProjectMdl::find($project);

        $photos = ProjectPhotoMdl::where('project_id', $project->id)->get();

        $photosCount = ProjectPhotoMdl::where('project_id', $project->id)->count();

        return view('projects.glary', compact('project', 'photos', 'photosCount'));
    }
    /**
     * ============================
     * ============================
     */
    public function store(Request $req)
    {
        $valid = Validator::make($req->all(), [
            'project_id' => 'required|integer|exists:projects,id',
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
            $resize = Image::make("imgs/projects/{$imgName}")->resize(600, 900)->encode('png');
            Storage::put("public/imgs/projects/{$imgName}", $resize->__toString());
            //delete the file as a temp
            File::delete('imgs/projects/' . $imgName);
        } else {
            $imgName = null;
        }

        $photos = ProjectPhotoMdl::where('project_id', $req->project_id)->get();

        foreach ($photos as $photo) {
            $photo->status = 0;
            $photo->save();
        }

        ProjectPhotoMdl::create([
            'project_id' => $req->project_id,
            'photo' => $imgName,
        ]);

        $project = ProjectMdl::find($req->project_id);

        $project->master_photo = $imgName;
        $project->save();

        Alert()->success(__('general.Record Added Successfully'));
        return redirect()->route('project.photo.index', $project->id);
    }

    /**
     * ============================
     * ============================
     */
    public function setDef($photo)
    {
        $photo = ProjectPhotoMdl::find($photo);

        $photos = ProjectPhotoMdl::where('project_id', $photo->project_id)->get();

        foreach ($photos as $item) {
            $item->status = 0;
            $item->save();
        }

        $photo->status = 1;
        $photo->save();

        $project = ProjectMdl::find($photo->project_id);

        $project->master_photo = $photo->photo;
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
        $photo = ProjectPhotoMdl::find($photo);

        $project = ProjectMdl::find($photo->project_id);

        if ($project->master_photo == $photo->photo) {

            $project->master_photo = null;
            $project->save();
        }

        $photo->forceDelete();

        if ($project->master_photo == null) {
            $lastPhoto = ProjectPhotoMdl::where('project_id', $project->id)->orderBy('id', 'DESC')->first();

            $lastPhoto->status = 1;
            $lastPhoto->save();

            $project->master_photo = $lastPhoto->photo;
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

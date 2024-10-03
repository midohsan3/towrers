<?php

namespace App\Models;

use App\Models\CityMdl;
use App\Models\SectionMdl;
use App\Models\InstructionMdl;
use App\Models\ProjectPhotoMdl;
use App\Models\ProjectCategoryMdl;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProjectMdl extends Model
{
    use HasFactory, Notifiable, HasRoles, SoftDeletes;



    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $table = 'projects';

    protected $primaryKey = 'id';

    protected $fillable   = [
        'project_category_id', 'city_id', 'project_category_id', 'name_en', 'name_ar', 'progress', 'description_ar', 'description_en', 'address', 'lat', 'lng', 'status', 'featured', 'master_photo'
    ];

    protected $date = ['deleted_at'];

    /*
    =========================
    RELATIONS
    =========================
    */
    public function cityProject()
    {
        return $this->belongsTo(CityMdl::class, 'city_id');
    }
    /**
     * =======================
     * =======================
     */
    public function projectCategory_project()
    {
        return $this->belongsTo(ProjectCategoryMdl::class, 'project_category_id');
    }
    /**
     * =======================
     * =======================
     */
    public function project_has_photos()
    {
        return $this->hasMany(ProjectPhotoMdl::class, 'project_id');
    }
    /**
     * =======================
     * =======================
     */
    public function project_has_companies()
    {
        return $this->belongsToMany(CompanyMdl::class, 'company_project', 'project_id', 'company_id');
    }
    /**
     * =======================
     * =======================
     */
    public function instructionWProject(){
        return $this->hasMany(InstructionMdl::class, 'project_id');
    }
    /**
     * =======================
     * =======================
     */
}
<?php

namespace App\Models;

use App\Models\User;
use App\Models\CityMdl;
use App\Models\MajorMdl;
use App\Models\PackageMdl;
use App\Models\SectionMdl;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CompanyMdl extends Model
{
    use HasFactory, Notifiable, HasRoles, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $table = 'companies';

    protected $primaryKey = 'id';

    protected $fillable   = [
        'user_id', 'package_id', 'section_id', 'city_id',  'name_en', 'name_ar', 'responsible_name', 'position', 'license', 'bio_en', 'bio_ar', 'address', 'lat', 'lng', 'views', 'register_by', 'status', 'featured'
    ];

    protected $date = ['deleted_at'];

    /*
    =========================
    RELATIONS
    =========================
    */
    public function userCompany()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    /**
     * =======================
     * =======================
     */
    public function packageCompany()
    {
        return $this->belongsTo(PackageMdl::class, 'package_id');
    }
    /**
     * =======================
     * =======================
     */
    public function sectionCompany()
    {
        return $this->belongsTo(SectionMdl::class, 'section_id');
    }
    /**
     * =======================
     * =======================
     */
    public function cityCompany()
    {
        return $this->belongsTo(CityMdl::class, 'city_id');
    }
    /**
     * =======================
     * =======================
     */
    public function company_has_major()
    {
        return $this->belongsToMany(MajorMdl::class, 'company_major', 'company_id', 'major_id');
    }
    /**
     * =======================
     * =======================
     */
    public function company_has_projects()
    {
        return $this->belongsToMany(ProjectMdl::class, 'company_project', 'company_id', 'project_id');
    }
    /**
     * =======================
     * =======================
     */
}

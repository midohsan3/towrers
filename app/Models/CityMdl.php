<?php

namespace App\Models;

use App\Models\JobMdl;
use App\Models\CompanyMdl;
use App\Models\ProjectMdl;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CityMdl extends Model
{
    use HasFactory, Notifiable, HasRoles, SoftDeletes;



    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $table = 'cities';

    protected $primaryKey = 'id';

    protected $fillable   = [
        'name_en', 'name_ar', 'status'
    ];

    protected $date = ['deleted_at'];

    /*
    =========================
    RELATIONS
    =========================
    */
    public function companyCity()
    {
        return $this->hasMany(CompanyMdl::class, 'city_id');
    }
    /**
     * =======================
     * =======================
     */
    public function projectCity()
    {
        return $this->hasMany(ProjectMdl::class, 'city_id');
    }
    /**
     * =======================
     * =======================
     */
    public function jobCity()
    {
        return $this->hasMany(JobMdl::class, 'city_id');
    }
    /**
     * =======================
     * =======================
     */
    public function cvCity()
    {
        return $this->hasMany(CvMdl::class, 'city_id');
    }
    /**
     * =======================
     * =======================
     */
}

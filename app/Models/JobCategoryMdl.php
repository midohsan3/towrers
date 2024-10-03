<?php

namespace App\Models;

use App\Models\CvMdl;
use App\Models\JobMdl;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class JobCategoryMdl extends Model
{
    use HasFactory, Notifiable, HasRoles, SoftDeletes;


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $table = 'jobs_categories';

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
    public function jobWCategory()
    {
        return $this->hasMany(JobMdl::class, 'job_category_id');
    }
    /*
    =========================
    =========================
    */
    public function cvCategory()
    {
        return $this->hasMany(CvMdl::class, 'job_category_id');
    }
    /*
    =========================
    =========================
    */
}

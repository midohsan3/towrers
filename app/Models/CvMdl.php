<?php

namespace App\Models;

use App\Models\User;
use App\Models\CityMdl;
use App\Models\JobCategoryMdl;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CvMdl extends Model
{
    use HasFactory, Notifiable, HasRoles, SoftDeletes;



    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $table = 'cvs';

    protected $primaryKey = 'id';

    protected $fillable   = [
        'city_id', 'job_category_id', 'user_id', 'name_en', 'name_ar', 'description_en', 'description_ar', 'experience', 'cv', 'whats_app', 'phone', 'email', 'status'
    ];

    protected $date = ['deleted_at'];

    /*
    =========================
    RELATIONS
    =========================
    */
    public function cityCv()
    {
        return $this->belongsTo(CityMdl::class, 'city_id');
    }

    /**
     * =======================
     * =======================
     */
    public function categoryCv()
    {
        return $this->belongsTo(JobCategoryMdl::class, 'job_category_id');
    }
    /**
     * =======================
     * =======================
     */
    public function userCv()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    /**
     * =======================
     * =======================
     */
}

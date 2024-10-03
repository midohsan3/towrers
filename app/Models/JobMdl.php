<?php

namespace App\Models;

use App\Models\User;
use App\Models\CityMdl;
use App\Models\InstructionMdl;
use App\Models\JobCategoryMdl;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class JobMdl extends Model
{
    use HasFactory, Notifiable, HasRoles, SoftDeletes;



    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $table = 'jobs';

    protected $primaryKey = 'id';

    protected $fillable   = [
        'city_id', 'job_category_id', 'user_id', 'name_en', 'name_ar', 'description_en', 'description_ar', 'email', 'phone', 'whatsapp', 'photo', 'status'
    ];

    protected $date = ['deleted_at'];

    /*
    =========================
    RELATIONS
    =========================
    */
    public function cityJob()
    {
        return $this->belongsTo(CityMdl::class, 'city_id');
    }

    /**
     * =======================
     * =======================
     */
    public function categoryJob()
    {
        return $this->belongsTo(JobCategoryMdl::class, 'job_category_id');
    }
    /**
     * =======================
     * =======================
     */
    public function userJob()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    /**
     * =======================
     * =======================
     */
    public function instructionWJob(){
        return $this->hasMany(InstructionMdl::class, 'job_id');
    }
    /**
     * =======================
     * =======================
     */
}
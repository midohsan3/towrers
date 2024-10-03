<?php

namespace App\Models;

use App\Models\User;
use App\Models\OldProjectPhotoMdl;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OldProjectMdl extends Model
{
    use HasFactory, Notifiable, HasRoles, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $table = 'old_projects';

    protected $primaryKey = 'id';

    protected $fillable   = [
        'user_id', 'name_en', 'name_ar', 'description_en', 'description_ar', 'main_pic',
    ];

    protected $date = ['deleted_at'];

    /*
    =========================
    RELATIONS
    =========================
    */
    public function userOldProject()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    /**
     * =======================
     * =======================
     */
    public function photos_oldProjects()
    {
        return $this->hasMany(OldProjectPhotoMdl::class, 'old_project_id');
    }
    /**
     * =======================
     * =======================
     */
}

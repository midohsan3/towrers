<?php

namespace App\Models;

use App\Models\OldProjectMdl;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OldProjectPhotoMdl extends Model
{
    use HasFactory, Notifiable, HasRoles, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $table = 'old_projects_photos';

    protected $primaryKey = 'id';

    protected $fillable   = [
        'old_project_id', 'photo', 'status'
    ];

    protected $date = ['deleted_at'];

    /*
    =========================
    RELATIONS
    =========================
    */
    public function oldProject_photos()
    {
        return $this->belongsTo(OldProjectMdl::class, 'old_project_id');
    }
    /**
     * =======================
     * =======================
     */
}

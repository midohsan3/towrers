<?php

namespace App\Models;

use App\Models\ProjectMdl;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProjectPhotoMdl extends Model
{
    use HasFactory, Notifiable, HasRoles, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $table = 'project_photos';

    protected $primaryKey = 'id';

    protected $fillable   = [
        'project_id', 'photo'
    ];

    protected $date = ['deleted_at'];

    /*
    =========================
    RELATIONS
    =========================
    */
    public function photo_has_project()
    {
        return $this->belongsTo(ProjectMdl::class, 'project_id');
    }
    /**
     * =======================
     * =======================
     */
}

<?php

namespace App\Models;

use App\Models\ProjectMdl;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProjectCategoryMdl extends Model
{
    use HasFactory, Notifiable, HasRoles, SoftDeletes;



    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $table = 'projects_categories';

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
    public function project_projectCategory()
    {
        return $this->hasMany(ProjectMdl::class, 'project_category_id');
    }
    /**
     * =======================
     * =======================
     */
}
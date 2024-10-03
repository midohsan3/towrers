<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class CompanyProjectMdl extends Model
{
    use HasFactory, Notifiable, HasRoles;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $table = 'company_project';

    protected $primaryKey = 'id';

    protected $fillable   = [
        'company_id', 'project_id'
    ];


    /*
    =========================
    RELATIONS
    =========================
    */

    /**
     * =======================
     * =======================
     */
}

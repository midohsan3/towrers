<?php

namespace App\Models;

use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CompanyMajorMdl extends Model
{

    use HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $table = 'company_major';

    protected $primaryKey = 'id';

    protected $fillable   = [
        'company_id', 'major_id'
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

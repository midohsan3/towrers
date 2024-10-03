<?php

namespace App\Models;

use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class VideoMdl extends Model
{
    use HasFactory, Notifiable, HasRoles;



    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $table = 'videos';

    protected $primaryKey = 'id';

    protected $fillable   = [
        'link', 'cover', 'video', 'featured', 'description_ar', 'description_en'
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

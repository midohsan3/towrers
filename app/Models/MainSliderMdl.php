<?php

namespace App\Models;

use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MainSliderMdl extends Model
{
    use HasFactory, Notifiable, HasRoles, SoftDeletes;



    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $table = 'main_sliders';

    protected $primaryKey = 'id';

    protected $fillable   = [
        'small_head_en', 'small_head_ar', 'head_en', 'head_ar', 'photo', 'link', 'status'
    ];

    protected $date = ['deleted_at'];

    /*
    =========================
    RELATIONS
    =========================
    */

    /*
    =========================
    =========================
    */
}

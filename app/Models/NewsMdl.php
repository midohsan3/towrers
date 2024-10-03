<?php

namespace App\Models;

use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class NewsMdl extends Model
{
    use HasFactory, Notifiable, HasRoles;



    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $table = 'news_bars';

    protected $primaryKey = 'id';

    protected $fillable   = [
        'text_en', 'text_ar', 'link'
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
<?php

namespace App\Models;

use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserInterestMdl extends Model
{
    use HasFactory, Notifiable, HasRoles;

    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */

    protected $table = 'users_interests';

    protected $fillable = [
    'user_id', 'interest_id'
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
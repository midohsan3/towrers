<?php

namespace App\Models;

use App\Models\User;
use App\Models\InstructionMdl;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class InterestMdl extends Model
{
    use HasFactory, Notifiable, HasRoles, SoftDeletes;



    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */

    protected $table = 'interests';

    protected $primaryKey = 'id';

    protected $fillable = [
        'name_ar','name_en','status'
    ];

    protected $date = ['deleted_at'];

    /*
    =========================
    RELATIONS
    =========================
    */
    public function user_has_interest(){
        return $this->belongsToMany(User::class,'users_interests','interest_id','user_id');
    }
    /**
    * =======================
    * =======================
    */
    public function instructionWInterest(){
        return $this->hasMany(InstructionMdl::class, 'interest_id');
    }
    /**
    * =======================
    * =======================
    */
}
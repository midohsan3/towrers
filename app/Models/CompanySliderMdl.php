<?php

namespace App\Models;

use App\Models\User;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CompanySliderMdl extends Model
{
    use HasFactory, Notifiable, HasRoles, SoftDeletes;



    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $table = 'company_sliders';

    protected $primaryKey = 'id';

    protected $fillable   = [
        'user_id', 'head', 'description_en', 'description_ar', 'photo', 'status'
    ];

    protected $date = ['deleted_at'];

    /*
    =========================
    RELATIONS
    =========================
    */
    public function userCompanySlider()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    /*
    =========================
    =========================
    */
}
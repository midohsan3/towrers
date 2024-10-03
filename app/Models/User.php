<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\CvMdl;
use App\Models\JobMdl;
use App\Models\OrderMdl;
use App\Models\ProductMdl;
use App\Models\InterestMdl;
use App\Models\ClassifiedMdl;
use App\Models\OldProjectMdl;
use App\Models\SubscriptionMdl;
use App\Models\CommunicationMdl;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'phone',
        'role_name',
        'status',
        'approval',
        'profile_pic',
        'password',
    ];


    protected $date = ['deleted_at'];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /*
    =========================
    RELATIONS
    =========================
    */
    public function companyUser()
    {
        return $this->hasOne(CompanyMdl::class, 'user_id');
    }
    /**
     * =======================
     * =======================
     */
    public function conUser()
    {
        return $this->hasMany(CommunicationMdl::class, 'user_id');
    }
    /**
     * =======================
     * =======================
     */
    public function interest_has_user(){
        return $this->belongsToMany(InterestMdl::class,'users_interests','user_id','interest_id');
    }
    /**
     * =======================
     * =======================
     */
    public function oldProjectUser()
    {
        return $this->hasMany(OldProjectMdl::class, 'user_id');
    }
    /**
     * =======================
     * =======================
     */
    public function productUser()
    {
        return $this->hasMany(ProductMdl::class, 'user_id');
    }
    /**
     * =======================
     * =======================
     */
    public function subscriptionUser()
    {
        return $this->hasMany(SubscriptionMdl::class, 'user_id');
    }
    /**
     * =======================
     * =======================
     */
    public function companySliderUser()
    {
        return $this->hasMany(CompanySliderMdl::class, 'user_id');
    }
    /**
     * =======================
     * =======================
     */
    public function jobUser()
    {
        return $this->hasMany(JobMdl::class, 'user_id');
    }
    /**
     * =======================
     * =======================
     */
    public function cvUser()
    {
        return $this->hasOne(CvMdl::class, 'user_id');
    }
    /**
     * =======================
     * =======================
     */
    public function classifiedUser()
    {
        return $this->hasMany(ClassifiedMdl::class, 'user_id');
    }
    /**
     * =======================
     * =======================
     */
    public function orderUser()
    {
        return $this->hasMany(OrderMdl::class, 'user_id');
    }
    /**
     * =======================
     * =======================
     */
}

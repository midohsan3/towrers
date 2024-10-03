<?php

namespace App\Models;

use App\Models\CompanyMdl;
use App\Models\SubscriptionMdl;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PackageMdl extends Model
{
    use HasFactory, Notifiable, HasRoles, SoftDeletes;



    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $table = 'packages';

    protected $primaryKey = 'id';

    protected $fillable   = [
        'name_en', 'name_ar', 'period', 'price', 'features_en', 'features_ar', 'status'
    ];

    protected $date = ['deleted_at'];

    /*
    =========================
    RELATIONS
    =========================
    */
    public function companyPackage()
    {
        return $this->hasMany(CompanyMdl::class, 'package_id');
    }
    /**
     * =======================
     * =======================
     */
    public function subscriptionPackage()
    {
        return $this->hasMany(SubscriptionMdl::class, 'package_id');
    }
    /**
     * =======================
     * =======================
     */
}

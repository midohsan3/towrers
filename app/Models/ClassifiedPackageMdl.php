<?php

namespace App\Models;

use App\Models\SizeMdl;
use App\Models\ClassifiedMdl;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ClassifiedPackageMdl extends Model
{
    use HasFactory, Notifiable, HasRoles, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $table = 'classifieds_packages';

    protected $primaryKey = 'id';

    protected $fillable   = [
        'size_id', 'name_en', 'name_ar', 'position', 'period', 'price', 'status'
    ];

    protected $date = ['deleted_at'];

    /*
    =========================
    RELATIONS
    =========================
    */
    public function sizePackage()
    {
        return $this->belongsTo(SizeMdl::class, 'size_id');
    }
    /**
     * =======================
     * =======================
     */
    public function classifiedsWClassifiedsPackages()
    {
        return $this->hasMany(ClassifiedMdl::class, 'classified_package_id');
    }
    /**
     * =======================
     * =======================
     */
}

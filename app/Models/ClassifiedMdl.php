<?php

namespace App\Models;

use App\Models\User;
use App\Models\SizeMdl;
use App\Models\ClassifiedPackageMdl;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ClassifiedMdl extends Model
{
    use HasFactory, Notifiable, HasRoles, SoftDeletes;



    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $table = 'classifieds';

    protected $primaryKey = 'id';

    protected $fillable   = [
        'user_id', 'classified_package_id', 'size_id', 'name', 'phone', 'whatsapp', 'title_en', 'title_ar', 'photo', 'status', 'payment_status', 'paid_amount', 'refund_amount', 'started_at', 'ended_at', 'link'
    ];

    protected $date = ['deleted_at'];

    /*
    =========================
    RELATIONS
    =========================
    */
    public function userClassified()
    {
        return  $this->belongsTo(User::class, 'user_id');
    }

    /**
     * =======================
     * =======================
     */
    public function classifiedPackageWClassified()
    {
        return $this->belongsTo(ClassifiedPackageMdl::class, 'classified_package_id');
    }
    /**
     * =======================
     * =======================
     */
    public function sizeClassified()
    {
        return $this->belongsTo(SizeMdl::class, 'size_id');
    }
    /**
     * =======================
     * =======================
     */
}

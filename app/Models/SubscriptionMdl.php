<?php

namespace App\Models;

use App\Models\User;
use App\Models\PackageMdl;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SubscriptionMdl extends Model
{
    use HasFactory, Notifiable, HasRoles, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $table = 'subscriptions';

    protected $primaryKey = 'id';

    protected $fillable   = [
        'user_id', 'package_id', 'started_at', 'ended_at', 'pay_status', 'paid_amount', 'trans_no'
    ];

    protected $date = ['deleted_at'];

    /*
    =========================
    RELATIONS
    =========================
    */
    public function userSubscription()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    /**
     * =======================
     * =======================
     */
    public function packageSubscription()
    {
        return $this->belongsTo(PackageMdl::class, 'package_id');
    }
    /**
     * =======================
     * =======================
     */
}

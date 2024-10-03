<?php

namespace App\Models;

use App\Models\User;
use App\Models\ProductMdl;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OrderMdl extends Model
{
    use HasFactory, Notifiable, HasRoles, SoftDeletes;



    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $table = 'orders';

    protected $primaryKey = 'id';

    protected $fillable   = [
        'user_id', 'product_id', 'name', 'phone', 'email', 'subject', 'details', 'reject_reason', 'status'
    ];

    protected $date = ['deleted_at'];

    /*
    =========================
    RELATIONS
    =========================
    */
    public function userOrder()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * =======================
     * =======================
     */
    public function productOrder()
    {
        return $this->belongsTo(ProductMdl::class, 'product_id');
    }
    /**
     * =======================
     * =======================
     */
}
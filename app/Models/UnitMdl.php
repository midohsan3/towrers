<?php

namespace App\Models;

use App\Models\ProductMdl;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UnitMdl extends Model
{
    use HasFactory, Notifiable, HasRoles, SoftDeletes;



    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $table = 'units';

    protected $primaryKey = 'id';

    protected $fillable   = [
        'name_en', 'name_ar', 'status'
    ];

    protected $date = ['deleted_at'];

    /*
    =========================
    RELATIONS
    =========================
    */
    public function productUnit()
    {
        return $this->hasMany(ProductMdl::class, 'unit_id');
    }

    /**
     * =======================
     * =======================
     */
}

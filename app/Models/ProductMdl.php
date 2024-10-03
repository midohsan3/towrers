<?php

namespace App\Models;

use App\Models\User;
use App\Models\UnitMdl;
use App\Models\OrderMdl;
use App\Models\InstructionMdl;
use App\Models\ProductPhotoMdl;
use App\Models\ProductCategoryMdl;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductMdl extends Model
{
    use HasFactory, Notifiable, HasRoles, SoftDeletes;



    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $table = 'products';

    protected $primaryKey = 'id';

    protected $fillable   = [
        'user_id', 'product_category_id', 'unit_id', 'name_en', 'name_ar', 'quantity', 'price', 'description_en', 'description_ar', 'main_pic', 'featured'
    ];

    protected $date = ['deleted_at'];

    /*
    =========================
    RELATIONS
    =========================
    */
    public function userProduct()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    /**
     * =======================
     * =======================
     */
    public function category_ProductCategory()
    {
        return $this->belongsTo(ProductCategoryMdl::class, 'product_category_id');
    }
    /**
     * =======================
     * =======================
     */
    public function unitProduct()
    {
        return $this->belongsTo(UnitMdl::class, 'unit_id');
    }
    /**
     * =======================
     * =======================
     */
    public function productPhoto_Product()
    {
        return $this->hasMany(ProductPhotoMdl::class, 'product_id');
    }
    /**
     * =======================
     * =======================
     */
    public function orderProduct()
    {
        return $this->hasMany(OrderMdl::class, 'product_id');
    }
    /**
     * =======================
     * =======================
     */
    public function instructionWProduct(){
        return $this->hasMany(InstructionMdl::class, 'product_id');
    }
    /**
     * =======================
     * =======================
     */
}
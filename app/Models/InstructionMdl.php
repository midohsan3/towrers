<?php

namespace App\Models;

use App\Models\JobMdl;
use App\Models\ProductMdl;
use App\Models\ProjectMdl;
use App\Models\InterestMdl;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class InstructionMdl extends Model
{
    use HasFactory, Notifiable, HasRoles, SoftDeletes;



    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */

    protected $table = 'instructions';

    protected $primaryKey = 'id';

    protected $fillable = [
    'interest_id',
    'project_id',
    'job_id',
    'product_id',
    'name_en',
     'name_ar',
    ];

    protected $date = ['deleted_at'];

    /*
    =========================
    RELATIONS
    =========================
    */
    public function interestWInstruction(){
        return $this->belongsTo(InterestMdl::class, 'interest_id');
    }
    /**
    * =======================
    * =======================
    */
    public function projectWInstruction(){
        return $this->belongsTo(ProjectMdl::class, 'project_id');
    }
    /**
    * =======================
    * =======================
    */
    public function jobWInstruction(){
        return $this->belongsTo(JobMdl::class, 'job_id');
    }
    /**
    * =======================
    * =======================
    */
    public function productWInstruction(){
        return $this->belongsTo(ProductMdl::class, 'product_id');
    }
    /**
    * =======================
    * =======================
    */

}
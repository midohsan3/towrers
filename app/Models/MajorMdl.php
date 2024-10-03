<?php

namespace App\Models;

use App\Models\CompanyMdl;
use App\Models\SectionMdl;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MajorMdl extends Model
{
    use HasFactory, Notifiable, HasRoles, SoftDeletes;



    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $table = 'majors';

    protected $primaryKey = 'id';

    protected $fillable   = [
        'section_id', 'name_en', 'name_ar', 'status'
    ];

    protected $date = ['deleted_at'];

    /*
    =========================
    RELATIONS
    =========================
    */
    public function sectionMajor()
    {
        return $this->belongsTo(SectionMdl::class, 'section_id');
    }
    /*
    =========================
    =========================
    */
    public function major_has_company()
    {
        return $this->belongsToMany(CompanyMdl::class, 'company_major', 'major_id', 'company_id');
    }
    /*
    =========================
    =========================
    */
}

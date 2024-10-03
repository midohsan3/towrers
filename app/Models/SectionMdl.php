<?php

namespace App\Models;

use App\Models\MajorMdl;
use App\Models\CompanyMdl;
use App\Models\ProjectMdl;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SectionMdl extends Model
{
    use HasFactory, Notifiable, HasRoles, SoftDeletes;



    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $table = 'sections';

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
    public function majorSection()
    {
        return $this->hasMany(MajorMdl::class, 'section_id');
    }
    /**
     * =======================
     * =======================
     */
    public function companySection()
    {
        return $this->hasMany(CompanyMdl::class, 'section_id');
    }
    /**
     * =======================
     * =======================
     */
}

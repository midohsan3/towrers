<?php

namespace App\Models;

use App\Models\User;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CommunicationMdl extends Model
{
    use HasFactory, Notifiable, HasRoles, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $table = 'communications';

    protected $primaryKey = 'id';

    protected $fillable   = [
        'user_id', 'con_type', 'chanel'
    ];

    protected $date = ['deleted_at'];

    /*
    =========================
    RELATIONS
    =========================
    */
    public function userCon()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    /**
     * =======================
     * =======================
     */
}

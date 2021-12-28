<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    use HasFactory;

    protected $guarded=[];
    // protected $table = 'attendances';
    protected $primaryKey = 'id';
    // protected $dateFormat = 'Y-m-d H:i:sO';




     public function roles()
    {
        return $this->belongsToMany(Role::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StaffDetail extends Model
{
    use HasFactory;
    protected $guarded=[];
    public function staff()
    {
        return $this->belongsTo(Staff::class,'id');
        // return $this->belongsTo(User::class, 'foreign_key', 'owner_key');
    }
}

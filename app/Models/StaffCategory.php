<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StaffCategory extends Model
{
    use HasFactory;
    protected $guarded=[];
    public function staffs()
    {
        return $this->hasMany(Staff::class,'staff_category_id','id');
        // return $this->hasOne(Phone::class, 'foreign_key', 'local_key');
    }
}

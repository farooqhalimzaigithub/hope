<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    use HasFactory;
    protected $guarded=[];



     public function staffDetail()
    {
        return $this->hasOne(StaffDetail::class,'staff_id','id');
        // return $this->hasOne(Phone::class, 'foreign_key', 'local_key');
    }
     public function staffSaleryInfo()
    {
        return $this->hasOne(StaffSaleryInfo::class,'staff_id','id');
        // return $this->hasOne(Phone::class, 'foreign_key', 'local_key');
    }
     public function professionalInfo()
    {
        return $this->hasOne(ProfessionalInfo::class,'staff_id','id');
        // return $this->hasOne(Phone::class, 'foreign_key', 'local_key');
    }



    public function staffCategory()
    {
        return $this->belongsTo(StaffCategory::class,'staff_category_id');
        // return $this->belongsTo(User::class, 'foreign_key', 'owner_key');
    }
    public function designation()
    {
        return $this->belongsTo(Designation::class,);
        // return $this->belongsTo(User::class, 'foreign_key', 'owner_key');
    }
}

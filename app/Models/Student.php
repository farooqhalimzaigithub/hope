<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\studentDetail;
class Student extends Model
{
    use HasFactory;
     // protected $guarded=[];
      protected $fillable = ['first_name', 'last_name', 'sur_name', 'dob', 'cnic_no', 'father_name', 'father_cnic_no', 'registration_no', 'admission_no', 'image', 'father_occupation', 'religion_id', 'cast_id', 'province_id', 'country_id', 'school_id'];


      public function studentDetail()
    {
        return $this->hasOne(studentDetail::class,'student_id','id');
        // return $this->hasOne(Phone::class, 'foreign_key', 'local_key');
    }

   //  public function usersprofiles(){
   // return $this->hasOne(Userprofile::class, 'id', 'user_id');
// }
}

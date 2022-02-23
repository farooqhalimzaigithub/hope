<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\studentDetail;
use App\Models\StudentAttendance;
class Student extends Model
{
    use HasFactory;
     // protected $guarded=[];
      protected $fillable = ['first_name', 'last_name', 'sur_name', 'dob', 'cnic_no', 'father_name', 'father_cnic_no', 'registration_no', 'admission_no', 'image', 'father_occupation', 'religion_id', 'cast_id', 'province_id', 'country_id', 'school_id'];


public function studentFees()
    {
        return $this->hasMany(StudentFee::class,'student_id','id');
    }
    public function studentAttendances()
    {
        return $this->hasMany(StudentAttendance::class,'student_id','id');
    }

 public function classSectionSession()
    {
        return $this->belongsToMany(ClassSectionSession::class,'student_classes','student_id','class_section_session_id');
    }

    public function studentClasses()
    {
           return $this->hasMany(StudentClass::class,'student_id','id');//1st foriegn key and second st_class table primary  key
    }

    public function feeCollections()
    {
           return $this->hasMany(FeeCollect::class,'student_id','id');//1st foriegn key and second st_class table primary  key
    }
 // public function studentFees()
 //    {
 //           return $this->hasMany(StudentFee::class,'student_id','id');//1st foriegn key and second st_class table primary  key
 //    }

  // ==============================

      public function studentDetail()
    {
        return $this->hasOne(studentDetail::class,'student_id','id');
        // return $this->hasOne(Phone::class, 'foreign_key', 'local_key');
    }

    //  public function studentClasses()
    // {
    //     return $this->hasMany(StudentClass::class,'student_id','id');
    // }

   //  public function usersprofiles(){
   // return $this->hasOne(Userprofile::class, 'id', 'user_id');
// }
}

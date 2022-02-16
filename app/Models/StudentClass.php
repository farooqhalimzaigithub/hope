<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentClass extends Model
{
    use HasFactory;
     protected $guarded=[];


    //inverse relation  one to many
    public function student()
    {
          return $this->belongsTo(Student::class,'student_id','id');
    }

    //inverse relation one to many
    public function css()
    {
         return $this->belongsTo(ClassSectionSession::class,'class_section_session_id','id');
    }
    // ===================================
     // relation of Hasmany through
public function feeTarrif()//this is used for fee adding or create page
    {
         return $this->belongsTo(FeeTarrif::class,'class_section_session_id', 'id');
    }
    public function feeCollect()//this is used for fee adding or create page
    {
         return $this->belongsTo(FeeCollect::class,'class_section_session_id', 'id');
    }
    // public function feeTarrif()//this is used for fee adding or create page
    // {
    //      return $this->hasManyThrough(Fee::class,FeeTarrif::class,'id', 'id');
    // }


}

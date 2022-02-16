<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentFee extends Model
{
    use HasFactory;
    protected $guarded=[];



    //inverse relation  one to many
    public function student()
    {
          return $this->belongsTo(Student::class,'student_id','id');
    }
    //inverse relation  one to many
    public function session()
    {
          return $this->belongsTo(Session::class,'session_id','id');
    }

    //inverse relation one to many
    public function css()
    {
         return $this->belongsTo(ClassSectionSession::class,'class_section_session_id','id');
    }
    public function cssClass()
    {
         return $this->hasManyThrough(ClassSectionSession::class,FreeClass::class,'id','id');
    }
}

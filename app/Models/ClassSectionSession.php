<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\FreeClass;
use App\Models\Session;
use App\Models\Section;
class ClassSectionSession extends Model
{
    use HasFactory;
     protected $guarded=[];



     // relation of Many TO Many
public function students()
    {
         return $this->belongsToMany(Student::class,'student_classes','class_section_session_id','student_id');//
    }

public function feeCollections()
    {
           return $this->hasMany(FeeCollect::class,'class_section_session_id','id');//1st foriegn key and second st_class table primary  key
    }
    
    // =========================

 public function feeTarrifs()
    {
        return $this->hasMany(FeeTarrif::class);
    }

public function studentClasses()
    {
        return $this->hasMany(StudentClass::class,'class_section_session_id','id');
    }

      // //inverse relation one to many
    public function section()
    {
         return $this->belongsTo(Section::class,'section_id','id');//1st one f.k and 2nd section table primary key
    }
    //inverse relation one to many
    public function session()
    {
         return $this->belongsTo(Session::class,'session_id','id');
    }
public function class()//remove es student registration accur problem
    {
         return $this->belongsTo(FreeClass::class,'class_id','id');
    }
}

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

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeeTarrif extends Model
{
    use HasFactory;
     protected $guarded=[];


 
 public function fee()
    {
        return $this->belongsTo(Fee::class,'fee_id','id');
    }
    public function css()
    {
        return $this->belongsTo(ClassSectionSession::class,'class_section_session_id','id');
    }
     public function cssClass()
    {
        return $this->hasManyThrough(FreeClass::class,ClassSectionSession::class,'id','id');
    }



    
     
}

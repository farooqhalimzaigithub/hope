<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeeStructure extends Model
{
    use HasFactory;
    protected $guarded=[];



    public function feeType()
    {
        return $this->belongsTo(FeeCategory::class,'fee_type_id','id');
    }
    public function css()
    {
        return $this->belongsTo(ClassSectionSession::class,'class_section_session_id','id');
    }
     public function session()
    {
        return $this->belongsTo(Session::class,'session_id','id');
    }
    //  public function cssClass()
    // {
    //     return $this->hasManyThrough(FreeClass::class,ClassSectionSession::class,'id','id');
    // }
}

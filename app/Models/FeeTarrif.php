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
    public function level()
    {
        return $this->belongsTo(Level::class,'class_id','id');
    }
}

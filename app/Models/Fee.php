<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fee extends Model
{
    use HasFactory;
     protected $guarded=[];



      public function feeCategory()
    {
        return $this->belongsTo(FeeCategory::class);
    }


     public function feeTarrifs()
    {
        return $this->hasMany(FeeTarrif::class,'fee_id','id');
        // note: we can also include comment model like: 'App\Models\Comment'
    }
}

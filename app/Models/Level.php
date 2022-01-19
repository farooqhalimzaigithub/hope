<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    use HasFactory;
     protected $guarded=[];

     public function feeTarrifs()
    {
        return $this->hasMany(FeeTarrif::class,'class_id','id');
        // note: we can also include comment model like: 'App\Models\Comment'
    }
     
}

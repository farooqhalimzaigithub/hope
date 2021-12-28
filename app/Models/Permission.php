<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
	public $timestamps = false;
    use HasFactory;
     protected $guarded=[];
    // protected $table = 'attendances';
    protected $primaryKey = 'id';


     //inverse relation one to many
    // public function role()
    // {
    //      return $this->belongsToM(Role::class,'role_id','id');
    // }
}

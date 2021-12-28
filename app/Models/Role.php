<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
class Role extends Model
{
    use HasFactory;
     protected $guarded=[];
    // protected $table = 'attendances';
    protected $primaryKey = 'id';





   
    public function modules()
    {
        return $this->belongsToMany(Module::class);
    }
    /**
     * Get the comments for the blog post.
     */
    public function users()
    {
        return $this->hasMany(User::class);
    }
    //  public function permissions()
    // {
    //     return $this->belongsToMany(Permission::class);
    // }
     // relation of One TO Many
// public function permissions()
//     {
//         return $this->hasMany(Permission::class,'role_id', 'id');
//     }
}

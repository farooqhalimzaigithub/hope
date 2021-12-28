<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentDetail extends Model
{
    use HasFactory;
     protected $fillable = ['student_id','postal_address','permanent_address','contact_no','cellular_no','guardian_name','guardian_cnic','gender','blood_id','health_name','waight','height','house_name','current_class_id','admission_class_id','section_id','city_id','guardian_mobile_number','clc_no','remark','school_id'];


     public function students()
    {
        return $this->belongsTo(Student::class,'id');
        // return $this->belongsTo(User::class, 'foreign_key', 'owner_key');
    }
//     public function users(){
//    return $this->belongsTo(User::class, 'id');
// }
}

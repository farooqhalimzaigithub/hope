<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Student;

class StudentAttendance extends Model
{
    use HasFactory;
    protected $guarded=[];


    public function student()
    {
        return $this->BelongsTo(Student::class,'student_id','id');
    }
    public function css()
    {
        return $this->BelongsTo(ClassSectionSession::class,'css_id','id');
    }

}

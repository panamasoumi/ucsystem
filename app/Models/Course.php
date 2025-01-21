<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = ['course_name', 'course_code', 'semester'];

    public function enrollments()
    {
        return $this->hasMany(Enrollment::class,'course_id');
    }
        

    public function teachers()
    {
        return $this->belongsToMany(User::class,'course_teacher','course_id','teacher_id')
        ->where('role', 'teacher')
        ->withPivot('semester');
    }

    public function students(): BelongsToMany
    {
        return $this->belongsToMany(User::class,'course_student','course_id','student_id')
            ->where('role', 'student')
            ->withPivot('semester');
    }
    
}

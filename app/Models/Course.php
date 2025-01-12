<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

public function enrollments(){
    return $this->hasMany(Enrollment::class,'course_id');
}

public function teachers()
    {
        return $this->belongsToMany(Teacher::class)->withPivot('credits');
    }
    
}

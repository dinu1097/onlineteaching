<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enrollment extends Model
{
           // Method to create a new course
           protected $primaryKey = 'enrollment_id';
           protected $fillable = ['student_id', 'course_id', 'payment_status'];
       
           public function student()
           {
               return $this->belongsTo(User::class, 'student_id', 'user_id');
           }
       
           public function course()
           {
               return $this->belongsTo(Course::class, 'course_id', 'course_id');
           }
}

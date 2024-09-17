<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    // Specify the table associated with the model
    protected $table = 'courses';

    // Specify the primary key for the table
    protected $primaryKey = 'course_id';

    // Specify whether the primary key is auto-incrementing
    public $incrementing = true;

    // Specify the data type of the primary key
    protected $keyType = 'int';

    // Specify the attributes that are mass assignable
    protected $fillable = [
        'title',
        'description',
        'standard',
        'subject',
        'teacher_id',
        'price',
        'intro_video',
        'course_video',
        'thumbnail',
    ];

    // Specify the attributes that should be hidden for arrays (if any)
    protected $hidden = [];

    // Specify the attributes that should be cast to native types
    protected $casts = [
        // Example: 'price' => 'float',
    ];

    // Define any relationships if needed
    // For example, if Course belongs to a Teacher
    public function teacher()
    {
        return $this->belongsTo(User::class, 'teacher_id', 'user_id');
    }
    public function reviews()
    {
        return $this->hasMany(Review::class, 'course_id', 'course_id');
    }
}

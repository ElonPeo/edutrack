<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enrollment extends Model
{
    use HasFactory;

    protected $fillable = ['course_id', 'student_id', 'score'];

    // Mối quan hệ: Mỗi enrollment thuộc về một học sinh
    public function student()
    {
        return $this->belongsTo(User::class, 'student_id');
    }

    // Mối quan hệ: Mỗi enrollment thuộc về một khóa học
    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id');
    }
}

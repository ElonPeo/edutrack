<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',        // Thêm vào danh sách fillable
        'description',  // Thêm vào danh sách fillable
        'teacher_id',   // Thêm vào danh sách fillable
    ];

    // Mối quan hệ với giáo viên (người tạo khóa học)
    public function teacher()
    {
        return $this->belongsTo(User::class, 'teacher_id');
    }

    public function students()
    {
        return $this->belongsToMany(User::class, 'enrollments', 'course_id', 'student_id');
    }

}

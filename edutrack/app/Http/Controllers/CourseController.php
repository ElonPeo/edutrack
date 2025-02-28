<?php

namespace App\Http\Controllers;


use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Enrollment;

class CourseController extends Controller
{
    // Xử lý lưu khóa học mới
    public function store(Request $request)
    {
        if (Auth::user()->role !== 'teacher') {
            return redirect('/dashboard')->with('error', 'Bạn không có quyền tạo khóa học.');
        }

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        Course::create([
            'title' => $request->title,
            'description' => $request->description,
            'teacher_id' => Auth::id(),
        ]);

        return redirect('/dashboard')->with('success', 'Khóa học đã được tạo!');
    }

    // Cập nhật khóa học
    public function update(Request $request, $id)
    {
        $course = Course::findOrFail($id);

        if ($course->teacher_id !== Auth::id()) {
            return redirect('/dashboard')->with('error', 'Bạn không có quyền chỉnh sửa khóa học này.');
        }

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $course->update([
            'title' => $request->title,
            'description' => $request->description,
        ]);

        return redirect('/dashboard')->with('success', 'Khóa học đã được cập nhật!');
    }

    // Xóa khóa học
    public function destroy($id)
    {
        $course = Course::findOrFail($id);

        if ($course->teacher_id !== Auth::id()) {
            return redirect('/dashboard')->with('error', 'Bạn không có quyền xóa khóa học này.');
        }

        $course->delete();
        return redirect('/dashboard')->with('success', 'Khóa học đã bị xóa!');
    }


    public function enroll($id)
    {
        $course = Course::findOrFail($id);

        if (Auth::user()->role !== 'student') {
            return redirect('/dashboard')->with('error', 'Only students can enroll in courses.');
        }


        if (Enrollment::where('student_id', Auth::id())->where('course_id', $id)->exists()) {
            return redirect('/dashboard')->with('error', 'You are already enrolled in this course.');
        }

        Enrollment::create([
            'student_id' => Auth::id(),
            'course_id' => $id
        ]);

        return redirect('/dashboard')->with('success', 'You have successfully enrolled in the course!');
    }

    public function leaveCourse($id)
    {
        $course = Course::findOrFail($id);

        if (Auth::user()->role !== 'student') {
            return redirect('/dashboard')->with('error', 'Only students can leave courses.');
        }

        // Kiểm tra nếu học sinh đã tham gia khóa học hay chưa
        $enrollment = Enrollment::where('student_id', Auth::id())->where('course_id', $id)->first();

        if (!$enrollment) {
            return redirect('/dashboard')->with('error', 'You are not enrolled in this course.');
        }

        // Xóa bản ghi đăng ký khóa học
        $enrollment->delete();

        return redirect('/dashboard')->with('success', 'You have successfully left the course.');
    }


    

}

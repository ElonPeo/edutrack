<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Enrollment;
use App\Models\Course;
use Illuminate\Support\Facades\Auth;

class EnrollmentController extends Controller
{
    // Lấy danh sách khóa học đã tham gia
    public function enrolledCourses()
    {
        $userId = Auth::id();
        $courses = Course::whereHas('enrollments', function ($query) use ($userId) {
            $query->where('student_id', $userId);
        })->get();

        return response()->json($courses);
    }

    // Lấy danh sách khóa học chưa tham gia
    public function notEnrolledCourses()
    {
        $userId = Auth::id();
        $courses = Course::whereDoesntHave('enrollments', function ($query) use ($userId) {
            $query->where('student_id', $userId);
        })->get();

        return response()->json($courses);
    }

    // Đăng ký khóa học
    public function enroll(Request $request, $courseId)
    {
        $userId = Auth::id();

        // Kiểm tra đã tham gia hay chưa
        $exists = Enrollment::where('course_id', $courseId)->where('student_id', $userId)->exists();
        if ($exists) {
            return response()->json(['message' => 'Bạn đã tham gia khóa học này'], 400);
        }

        Enrollment::create([
            'course_id' => $courseId,
            'student_id' => $userId,
        ]);

        return redirect()->route('enrollments.index')->with('success', 'Tham gia khóa học thành công ');
    }

    // Rời khỏi khóa học
    public function leave($courseId)
    {
        $userId = Auth::id();
        Enrollment::where('course_id', $courseId)->where('student_id', $userId)->delete();

        return redirect()->route('enrollments.index')->with('success', 'Rời khóa học thành công ');
    }

    public function index()
    {
        $userId = Auth::id();
        $enrolledCourses = Course::whereHas('enrollments', function ($query) use ($userId) {
            $query->where('student_id', $userId);
        })->get();

        $notEnrolledCourses = Course::whereDoesntHave('enrollments', function ($query) use ($userId) {
            $query->where('student_id', $userId);
        })->get();

        return view('student.courses.index', compact('enrolledCourses', 'notEnrolledCourses'));
    }

}

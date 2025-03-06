<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\User;

class CourseController extends Controller
{


    public function index()
    {
        if (Auth::user()->role !== 'teacher') {
            return redirect('/')->with('error', 'You are not authorized to view this page.');
        }

        // Lấy các khóa học mà giáo viên đang đăng nhập đã tạo
        $courses = Course::where('teacher_id', Auth::id())->get();
        return view('teacher.courses.index', compact('courses'));
    }
    

    public function create()
    {
        return view('courses.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'video_url' => 'nullable|url',
        ]);
    
        // Tạo khóa học với ID của giáo viên đăng nhập
        Course::create([
            'title' => $validatedData['title'],
            'description' => $validatedData['description'],
            'video_url' => $validatedData['video_url'],
            'teacher_id' => Auth::id(),
        ]);
    
        return redirect()->route('courses.index')->with('success', 'Course created successfully.');
    }
    

    public function edit(Course $course)
    {
        return view('courses.edit', compact('course'));
    }

public function update(Request $request, $id)
{
    $validatedData = $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'nullable|string',
        'video_url' => 'nullable|url',
    ]);

    $course = Course::findOrFail($id);
    $course->update($validatedData);

    return redirect()->route('courses.index')->with('success', 'Course updated successfully.');
}


    public function destroy(Course $course)
    {
        $course->delete();
        return redirect()->route('courses.index')->with('success', 'Course deleted successfully.');
    }


}

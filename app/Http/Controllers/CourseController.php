<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\User;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::all();
        return view('courses.courses', compact('courses'));
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'owner_id' => 'required|exists:users,id'
        ]);
    
        $user = User::findOrFail($request->owner_id);  // Tìm người dùng dựa trên owner_id
    
        // Tạo khoá học mới
        $course = new Course();
        $course->name = $request->name;
        $course->description = $request->description;
        $course->owner_id = $request->owner_id;
        $course->owner_name = $user->name; 
        $course->save();
    
        return redirect()->route('courses.index')->with('success', 'Khoá học đã được tạo thành công!');
    }
    
    // Assuming you are passing the user ID directly via the route
    public function showCoursesByUserId($userId)
    {

        $user = User::findOrFail($userId);  
        $courses = Course::where('owner_id', $userId)->get();  
        return view('courses.user_courses', compact('user', 'courses')); 
    }


}

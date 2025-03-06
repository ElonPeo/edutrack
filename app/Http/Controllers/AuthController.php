<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Model;
use App\Models\Course;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'role' => 'required|in:student,teacher'
        ]);

        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
            'role' => $validatedData['role']
        ]);

        Auth::login($user);
        $userRole = Auth::user()->role;
        switch ($userRole) {
            case 'teacher':
                return redirect('/dashboard/teacher');
            case 'student':
                return redirect('/dashboard/student');
            default:
                return redirect('/');
        }
    }
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
    
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
    
            $userRole = Auth::user()->role;
            switch ($userRole) {
                case 'teacher':
                    return redirect('/dashboard/teacher');
                case 'student':
                    return redirect('/dashboard/student');
                default:
                    return redirect('/');
            }
        }
    
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }
    


    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }


    public function deleteAccount(Request $request)
    {
        $user = Auth::user();
    
        if ($user) {
            // Cập nhật khóa học của người dùng này trước khi xóa
            Course::where('teacher_id', $user->id)->update(['teacher_id' => null]);
    
            Auth::logout(); // Đăng xuất người dùng
            User::where('id', $user->id)->delete();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
    
            return redirect('/')->with('status', 'Your account has been deleted successfully.');
        }
    
        return redirect('/login')->withErrors(['error' => 'Unable to delete the account. Please try again.']);
    }



    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|string|min:6|confirmed',
        ]);

        $user = Auth::user();

        // Kiểm tra mật khẩu hiện tại có chính xác không
        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'Your current password does not match our records.']);
        }

        // Cập nhật mật khẩu mới
        $user->password = Hash::make($request->new_password);
        $user = Auth::user();
        if (!$user) {
            return back()->with('error', 'User not found.');
        }


        $user->password = Hash::make($request->new_password);
        $user->save();
        return redirect()->route('showLogin')->with('success', 'Your password has been updated successfully.');
    }
    



    public function showAuthenticationForm()
    {
        return view('auth.authentication');
    }

    public function showLogin()
    {
        return view('auth.profile');
    }


}

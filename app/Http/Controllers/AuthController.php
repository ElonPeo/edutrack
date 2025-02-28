<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


class AuthController extends Controller
{
    // Hiển thị form đăng nhập/đăng ký/đăng xuất
    public function showAuthenticationForm()
    {
        return view('auth.authentication');
    }

    // Xử lý đăng nhập
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
    
        if (Auth::attempt($credentials, $request->filled('remember'))) {
            $request->session()->regenerate();
            
            // Chuyển hướng đến trang dashboard
            return redirect()->route('dashboard');
        }
    
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }
    

    // Xử lý đăng ký
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
        return redirect()->intended('dashboard');
    }

    // Đăng xuất
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }


    public function showUsers()
    {
        $users = User::all()->makeHidden(['password']);
        return view('users', compact('users'));
    }


    
    // public function changePassword(Request $request)
    // {
    //     $request->validate([
    //         'current_password' => 'required',
    //         'new_password' => 'required|min:6|confirmed',
    //     ]);

    //     $user = Auth::user();

    //     // Kiểm tra mật khẩu hiện tại
    //     if (!Hash::check($request->current_password, $user->password)) {
    //         return redirect()->back()->with('error', 'Current password is incorrect.');
    //     }

    //     // Cập nhật mật khẩu mới
    //     $user->update([
    //         'password' => Hash::make($request->new_password),
    //     ]);

    //     return redirect()->back()->with('success', 'Password changed successfully!');
    // }

    // public function deleteAccount()
    // {
    //     $user = Auth::user();

    //     Auth::logout(); // Đăng xuất trước khi xóa tài khoản
    //     $user->delete();

    //     return redirect('/')->with('success', 'Your account has been deleted.');
    // }




}

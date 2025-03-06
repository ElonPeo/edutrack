<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    public function handle($request, Closure $next, $role)
    {
        if (!Auth::check() || Auth::user()->role !== $role) {
            // Redirect hoặc trả về lỗi tùy theo yêu cầu của ứng dụng
            return redirect('home')->with('error', 'You do not have permission to access this page.');
        }

        return $next($request);
    }
}

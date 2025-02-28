<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UM Auth</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link href="{{ asset('..\assets\css\shared.css') }}" rel="stylesheet">
    <link href="{{ asset('../assets/css/Authentication/authentication.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=DynaPuff:wght@400;500;600;700&family=Roboto:wght@100;400;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=DynaPuff:wght@400..700&family=Playwrite+GB+S:ital@0;1&family=Playwrite+IT+Moderna:wght@100..400&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    
</head>


<body class="auth-body">
    @include('components.navigationBar')


    <div class="login-back-div">
        <video autoplay loop muted playsinline class="video-bg">
            <source src="../assets/videos/edutrack.mp4" type="video/mp4">
            Trình duyệt của bạn không hỗ trợ video.
        </video>
        <div class="first-half-div">
            <div class="first-half-div-content">
                <form method="POST" action="{{ route('login') }}" class="first-half-div-content" id="login-form">
                    <a class="font-30">
                        Login here
                    </a>
                    @csrf
                    <input type="email" name="email" placeholder="Username" class="user-pass-input-size">
                    <input type="password" name="password" placeholder="Password" class="user-pass-input-size">
                    <div class="remember-me">
                        <input type="checkbox" name="remember" class="size-box-16">
                        <a class="font-10">
                            Remember me
                        </a>
                    </div>
                    <button type="submit" class="login-button font-20">
                        Login
                    </button>
                </form>
            </div>
            <div class="hidden-half-div-content">
                <a class="font-30">
                    Register here
                </a>
                <form id="register-form" method="POST" action="{{ route('register') }}">
                    @csrf  
                    <input type="text" name="name" placeholder="Name" class="user-pass-input-size" required>
                    <input type="email" name="email" placeholder="Email" class="user-pass-input-size" required>
                    <input type="password" name="password" placeholder="Password" class="user-pass-input-size" required>
                    <input type="password" name="password_confirmation" placeholder="Confirm password" class="user-pass-input-size" required>
                    <p id="password-error" style="color: red; display: none;">Passwords are not the same !</p>
                    <div class="role-check gap-10">
                        <input type="checkbox" id="student" name="role" value="student" checked>
                        <a>Student</a>
                        <input type="checkbox" id="teacher" name="role" value="teacher">
                        <a>Teacher</a>
                    </div>
                    <button type="submit" class="login-button font-20">Register</button>
                </form>
            </div>
        </div>
        <div class="second-half-div-content">
                <a class="font-30 PES-font">
                    Enjoy your journey
                </a>
                <a>
                    If you do not have an account, please register now by clicking the button below.
                </a>
                <button class="recover-button font-20">
                    <div class="flex flex-row justify-center align-center">
                        <img src="..\assets\images\icons\back-arrow.png" class="icon-arrow">
                        <a class="retrieve-password">Register now !</a>
                    </div>
                </button>
        </div>

        <div class="hidden-second-half-div-content">
                <a class="font-30 PES-font">
                    Easy to register
                </a>
                <a>
                    If you already have an account, please log in now using the button below.
                </a>
                <button class="hidden-login-button dune-font font-20">
                    <div class="flex flex-row justify-center align-center">
                        <a class="hidden-login">Login</a>
                        <img src="..\assets\images\icons\next-arrow.png" class="hidden-icon-arrow">
                    </div>
                </button>
        </div>
    </div>



    <!-- {{-- Đăng xuất --}}
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit">Logout</button>
    </form>  -->

    {{-- Hiển thị lỗi --}}
    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</body>
</html>



<script>
        document.addEventListener("DOMContentLoaded", function() {
        const recoverButton = document.querySelector(".recover-button");
        const hiddenLoginButton = document.querySelector(".hidden-login-button");

        if (recoverButton) {
            recoverButton.addEventListener("click", function() {
                document.querySelector(".second-half-div-content").classList.toggle("move");

                setTimeout(() => {
                    document.querySelector(".first-half-div").classList.toggle("move");
                }, 300);
                setTimeout(() => {
                    document.querySelector(".first-half-div-content").classList.toggle("move");
                }, 600);
                setTimeout(() => {
                    document.querySelector(".hidden-half-div-content").classList.toggle("move");
                }, 900);
                setTimeout(() => {
                    document.querySelector(".hidden-second-half-div-content").classList.toggle("move");
                }, 1200);
            });
        } else {
            console.error("Không tìm thấy .recover-button");
        }

        if (hiddenLoginButton) {
            hiddenLoginButton.addEventListener("click", function() {
                document.querySelector(".hidden-second-half-div-content").classList.toggle("move");
                document.querySelector(".hidden-half-div-content").classList.toggle("move");
                document.querySelector(".first-half-div-content").classList.toggle("move");

                setTimeout(() => {
                    document.querySelector(".first-half-div").classList.toggle("move");
                }, 300);
                setTimeout(() => {
                    document.querySelector(".second-half-div-content").classList.toggle("move");
                }, 600);
            });
        } else {
            console.error("Không tìm thấy .hidden-login-button");
        }
    });
    
    document.querySelectorAll('input[name="role"]').forEach(checkbox => {
        checkbox.addEventListener('change', function() {
            document.querySelectorAll('input[name="role"]').forEach(cb => {
                if (cb !== this) cb.checked = false;
            });
        });
    });
</script>

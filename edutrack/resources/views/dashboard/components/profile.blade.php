<link href="{{ asset('..\assets\css\Dashboard\components\Profile.css') }}" rel="stylesheet">

<div class="main-profile">
    <div class="profile-div">
        <div class="profile-img"><img src="\assets\images\profile\profile.jpg" alt=""></div>
        <div class="profile-infor">
            <a>
                <span style="font-weight: bold;">Name:</span> {{ Auth::user()->name }}
            </a>
            <a>
                <span style="font-weight: bold;">Email:</span> {{ Auth::user()->email }}
            </a>
            <a>
                <span style="font-weight: bold;">Role:</span> {{ Auth::user()->role }}</li>
            </a>
        </div>
    </div>
    <h2>Change Password</h2>
        <form method="POST" action="{{ route('user.changePassword') }}">
            @csrf
            <div>
                <label>Current Password</label>
                <input type="password" name="current_password" required>
            </div>
            <div>
                <label>New Password</label>
                <input type="password" name="new_password" required>
            </div>
            <div>
                <label>Confirm New Password</label>
                <input type="password" name="new_password_confirmation" required>
            </div>
            <div>
                <button type="submit">Change Password</button>
            </div>
        </form>
        {{-- Form xóa tài khoản --}}
        <h2>Delete Account</h2>
        <form method="POST" action="{{ route('user.deleteAccount') }}">
            @csrf
            <button type="submit" onclick="return confirm('Are you sure you want to delete your account? This action cannot be undone.')">
                Delete Account
            </button>
        </form>
</div>


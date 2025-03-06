@extends(auth()->user()->role === 'student' ? 'student.app' : 'teacher.app')

@section('profile-content')
<style>
    .profile-back-div{
        height: 300px;
        width: 100%;
        display: flex;
        flex-direction: row;
        align-items: start;
        justify-content: start; 
        gap: 30px;
    }
    .avatar-back-div{
        height: 300px;
        width: 200px;
        background-color: white;
        border-radius: 10px;
        overflow: hidden;
    }
    .avatar-back-div img{
        height: 100%;
        width: 100%;
        object-fit: cover;
    }

    .infor-user-back-div {
        display: flex;
        flex-direction: column;
        justify-content: start;
        align-items: start;
    }

    .infor-user-back-div a{
        font-size: 25px;
    }

</style>
    <h2>Information</h2><br>

    <div class="profile-back-div">
        <div class="avatar-back-div">
            <img src="{{ asset('..\assets\images\profile\profile.jpg') }}" alt="Profile">
        </div>
        <div class="infor-user-back-div">
            <a>Name: {{ Auth::user()->name }}</a>
            <a>Email: {{ Auth::user()->email }}</a>
            <a>Role: {{ Auth::user()->role }}</a>         
        </div>
    </div>

    <br><h2>Action</h2>

    <!-- Button trigger modal -->
    <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#changePasswordModal">
        Change Password
    </button>

    <form action="{{ route('account.delete') }}" method="POST" onsubmit="return confirm('Are you sure you want to delete your account?');">
        @csrf
        @method('DELETE')
        <br>
        <button type="submit" class="btn btn-danger">DELETE ACCOUNT</button>
    </form>


    <!-- Modal -->
    <div class="modal fade" id="changePasswordModal" tabindex="-1" aria-labelledby="changePasswordModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="changePasswordModalLabel">Change Password</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('password.update') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="current-password" class="form-label">Current Password</label>
                            <input type="password" class="form-control" id="current-password" name="current_password" required>
                        </div>
                        <div class="mb-3">
                            <label for="new-password" class="form-label">New Password</label>
                            <input type="password" class="form-control" id="new-password" name="new_password" required>
                        </div>
                        <div class="mb-3">
                            <label for="new-password-confirm" class="form-label">Confirm New Password</label>
                            <input type="password" class="form-control" id="new-password-confirm" name="new_password_confirmation" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

        


    


@endsection
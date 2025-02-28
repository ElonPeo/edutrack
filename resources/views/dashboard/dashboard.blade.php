<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link href="{{ asset('..\assets\css\shared.css') }}" rel="stylesheet">
    <link href="{{ asset('..\assets\css\Dashboard\dashboard.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=DynaPuff:wght@400;500;600;700&family=Roboto:wght@100;400;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=DynaPuff:wght@400..700&family=Playwrite+GB+S:ital@0;1&family=Playwrite+IT+Moderna:wght@100..400&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
</head>
<body>
    <div class="left-navigation-bar">
        <div class="dashboard-logo-div">
                <a>
                    <img src="{{ asset('assets\images\EduTrackLogo.png') }}" alt="Logo">
                </a>
            </div>
            <div class="list-container">
                <br>
                <button class="list-form button-active" type="button" onclick="toggleButton(this)" data-content="profile-content">
                    <img src="{{ asset('assets/images/icons/white-user.png') }}" alt="Profile" data-black="{{ asset('assets/images/icons/black-user.png') }}" data-white="{{ asset('assets/images/icons/white-user.png') }}">
                    Profile
                </button>
                <button class="list-form button-default" type="button" onclick="toggleButton(this)" data-content="course-content">
                    <img src="{{ asset('assets/images/icons/black-course.png') }}" alt="Course" data-black="{{ asset('assets/images/icons/black-course.png') }}" data-white="{{ asset('assets/images/icons/white-course.png') }}">
                    Course
                </button>
                <button class="list-form button-default" type="button" onclick="toggleButton(this)" data-content="crud-course-content">
                    <img src="{{ asset('assets/images/icons/black-crud-course.png') }}" alt="CRUD Course" data-black="{{ asset('assets/images/icons/black-crud-course.png') }}" data-white="{{ asset('assets/images/icons/white-crud-course.png') }}">
                    CRUDCourse
                </button>
                <button class="list-form button-default" type="button" onclick="toggleButton(this)" data-content="score-content">
                    <img src="{{ asset('assets/images/icons/black-scoring.png') }}" alt="Score" data-black="{{ asset('assets/images/icons/black-scoring.png') }}" data-white="{{ asset('assets/images/icons/white-scoring.png') }}">
                    Score
                </button>
            </div>  
            <div class="logout-btn">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf  
                    <button type="submit">
                        <img src="{{ asset('/assets/images/icons/log-out.png') }}" alt="Logout">
                        Logout
                    </button>
                </form>
            </div>
    </div>


    <div class="main-content">
        <div class="top-navigation-bar">
            <a id="nav-profile" class="current-function nav-link">Profile</a>
            <a id="nav-course" class="current-function nav-link" style="display: none;">Course (For students only)</a>
            <a id="nav-crud-course" class="current-function nav-link" style="display: none;">CRUD Course (For teachers only)</a>
            <a id="nav-score" class="current-function nav-link" style="display: none;">Score</a>
            <div class="infor-nb">
                <div class="small-profile-icon">
                    <img src="{{ asset('assets\images\icons\user.png') }}" alt="Logo">
                </div>
                <a class=""> Hello, {{ Auth::user()->name }} !</a>
            </div>
        </div>
        <div class="m-content">
            <div class="flex flex-col">
                <div id="profile-content" class="content-section">@include('dashboard.components.profile')</div>
                <div id="course-content" class="content-section" style="display: none;">@include('dashboard.components.course')</div>
                <div id="crud-course-content" class="content-section" style="display: none;">@include('dashboard.components.CRUDCourse')</div>
                <div id="score-content" class="content-section" style="display: none;">@include('dashboard.components.score')</div>

            </div>
            
        </div>
    </div>

</div>
    <!-- @auth
        <p>Welcome, {{ Auth::user()->name }}!</p>
        <ul>
            <li>Email: {{ Auth::user()->email }}</li>
            <li>Role: {{ Auth::user()->role }}</li>
        </ul>

        {{-- Nếu là giáo viên, hiển thị chức năng quản lý khóa học --}}
   {{-- Nếu là giáo viên, hiển thị danh sách khóa học đã tạo --}}
        @if (Auth::user()->role == 'teacher')
                    <h2>Your Courses</h2>
                    <ul>
                        @php
                            $courses = \App\Models\Course::where('teacher_id', Auth::id())->get();
                        @endphp
                        @forelse ($courses as $course)
                            <li>
                                <strong>{{ $course->title }}</strong> - {{ $course->description }}

                                {{-- Hiển thị danh sách học sinh đã tham gia khóa học --}}
                                <br><strong>Enrolled Students:</strong>
                                <ul>
                                    @forelse ($course->students as $student)
                                        <li>{{ $student->name }} - {{ $student->email }}</li>
                                    @empty
                                        <li>No students enrolled yet.</li>
                                    @endforelse
                                </ul>
                            </li>
                        @empty
                            <p>No courses found.</p>
                        @endforelse
                    </ul>
                @endif
         {{-- Nếu là học sinh, hiển thị danh sách khóa học có thể tham gia --}}
         @if (Auth::user()->role == 'student')
            <h2>Available Courses</h2>
            <ul>
                @php
                    $courses = \App\Models\Course::all();
                @endphp
                @forelse ($courses as $course)
                    <li>
                        <strong>{{ $course->title }}</strong> - {{ $course->description }}

                        {{-- Nếu học sinh chưa tham gia khóa học, hiển thị nút "Join" --}}
                        @if (!$course->students->contains(Auth::id()))
                            <form method="POST" action="{{ route('courses.enroll', $course->id) }}" style="display:inline;">
                                @csrf
                                <button type="submit">Join</button>
                            </form>
                        @else
                            {{-- Nếu học sinh đã tham gia, hiển thị nút "Leave" --}}
                            <form method="POST" action="{{ route('courses.leave', $course->id) }}" style="display:inline;">
                                @csrf
                                <button type="submit" onclick="return confirm('Are you sure you want to leave this course?')">Leave</button>
                            </form>
                        @endif
                    </li>
                @empty
                    <p>No courses available.</p>
                @endforelse
            </ul>
        @endif
    @else
        <p>You are not logged in. Please <a href="{{ route('login') }}">login</a>.</p>
    @endauth>

    <script>

    </script> -->
</body>
</html>


<script>
    function toggleButton(element) {
        // Xóa active khỏi tất cả các button và ẩn tất cả các phần nội dung và liên kết
        document.querySelectorAll('.list-form').forEach(form => {
            form.classList.remove('button-active');
            form.classList.add('button-default');
            form.querySelector('img').src = form.querySelector('img').getAttribute('data-black');

            document.getElementById(form.getAttribute('data-content')).style.display = 'none';
        });

        // Ẩn tất cả các thẻ <a> trong top-navigation-bar
        document.querySelectorAll('.nav-link').forEach(link => {
            link.style.display = 'none';
        });

        // Thêm active vào button được nhấn và hiển thị nội dung tương ứng
        element.classList.remove('button-default');
        element.classList.add('button-active');
        element.querySelector('img').src = element.querySelector('img').getAttribute('data-white');
        
        // Hiển thị nội dung và liên kết tương ứng với button được nhấn
        var contentId = element.getAttribute('data-content');
        document.getElementById(contentId).style.display = 'block';

        // Hiển thị thẻ <a> tương ứng trong top-navigation-bar
        document.getElementById('nav-' + contentId.replace('-content', '')).style.display = 'inline';
    }

    function editCourse(courseId) {
        document.getElementById('edit-course-form').style.display = 'block';

        let title = document.getElementById(`course-title-${courseId}`).innerText;
        let description = document.getElementById(`course-desc-${courseId}`).innerText;

        document.getElementById('edit-course-id').value = courseId;
        document.getElementById('edit-title').value = title;
        document.getElementById('edit-description').value = description;

        document.getElementById('update-course-form').action = `/courses/${courseId}`;
    }

    function cancelEdit() {
        document.getElementById('edit-course-form').style.display = 'none';
    }
</script>


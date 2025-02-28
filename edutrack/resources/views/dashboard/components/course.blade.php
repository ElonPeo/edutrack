<link href="{{ asset('..\assets\css\Dashboard\components\Course.css') }}" rel="stylesheet">


@if (Auth::user()->role == 'student')
    <h1>Available Courses</h1>

    <div class="container">
        <div class="course-list">
            @php
                $courses = \App\Models\Course::all();
            @endphp
            @forelse ($courses as $course)
                <div class="course">
                    <div class="course-photo-div">
                        <img src="..\assets\images\profile\Technical-Writing.png" alt="">
                    </div>
                    <div class="course-content">
                        <h2 >{{ $course->title }}</h2>
                        <a>{{ $course->description }}</a>
                        <div class="back-join-button">
                            @if (!$course->students->contains(Auth::id()))
                                <form method="POST" action="{{ route('courses.enroll', $course->id) }}" style="display:inline;">
                                    @csrf
                                    <button type="submit">Join</button>
                                </form>
                            @else
                                <form method="POST" action="{{ route('courses.leave', $course->id) }}" style="display:inline;">
                                    @csrf
                                    <button type="submit" onclick="return confirm('Are you sure you want to leave this course?')">Leave</button>
                                </form>
                            @endif
                        </div>
                    </div>
                </div>
            @empty
                <p>No courses available.</p>
            @endforelse

            
        </div>
    </div>

@endif
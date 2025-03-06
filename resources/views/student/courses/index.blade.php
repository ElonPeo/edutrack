@extends('student.app')

@section('student-content')
<div class="container">
    <h2 class="mb-4">Danh sách Khóa học</h2>

    <!-- Khóa học đã tham gia -->
    <h3>Khóa học đã tham gia</h3>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Title</th>
                <th>Description</th>
                <th>Teacher</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach($enrolledCourses as $course)
            <tr>
                <td>{{ $course->title }}</td>
                <td>{{ $course->description }}</td>
                <td>{{ $course->teacher->name ?? 'Chưa có giáo viên' }}</td>
                <td>
                    <form action="{{ route('courses.leave', $course->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Rời khỏi</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Khóa học chưa tham gia -->
    <h3>Khóa học chưa tham gia</h3>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Title</th>
                <th>Description</th>
                <th>Teacher</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach($notEnrolledCourses as $course)
            <tr>
                <td>{{ $course->title }}</td>
                <td>{{ $course->description }}</td>
                <td>{{ $course->teacher->name ?? 'Chưa có giáo viên' }}</td>
                <td>
                    <form action="{{ route('courses.enroll', $course->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-success btn-sm">Tham gia</button>
                    </form>
                    
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection


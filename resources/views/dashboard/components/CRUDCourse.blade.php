
@if (Auth::user()->role == 'teacher')
    
<form class="New-course" method="POST" action="{{ route('courses.store') }}">
    @csrf
    <div>
        <label for="title">Title</label>
        <input type="text" name="title" id="title" required>
    </div>
    <div>
        <label for="description">Description</label>
        <textarea name="description" id="description" required></textarea>
    </div>
    <div>
        <button type="submit">Create Course</button>
    </div>
</form>  


<div id="edit-course-form" class="container mt-4 p-3 border rounded bg-light" style="display: none;">
    <h2>Edit Course</h2>
    <form method="POST" id="update-course-form">
        @csrf
        @method('PUT')
        <input type="hidden" name="course_id" id="edit-course-id">
        <div class="mb-3">
            <label for="edit-title" class="form-label">Title</label>
            <input type="text" class="form-control" name="title" id="edit-title" required>
        </div>
        <div class="mb-3">
            <label for="edit-description" class="form-label">Description</label>
            <textarea class="form-control" name="description" id="edit-description" required></textarea>
        </div>
        <div>
            <button type="submit" class="btn btn-success">Update Course</button>
            <button type="button" class="btn btn-secondary" onclick="cancelEdit()">Cancel</button>
        </div>
    </form>
</div> 


<div class="container mt-4">
    <ul class="list-group scrollable-list">
        @php
            $courses = \App\Models\Course::where('teacher_id', Auth::id())->get();
        @endphp
        @forelse ($courses as $course)
            <li class="list-group-item">
                <h5 class="fw-bold">{{ $course->title }}</h5>
                <p class="text-muted">{{ $course->description }}</p>

                <div class="mt-2">
                    <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#editCourseModal" onclick="fillEditForm({{ $course->id }}, '{{ $course->title }}', '{{ $course->description }}')">✏ Edit</button>
                    <form action="{{ route('courses.destroy', $course->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc chắn muốn xóa khóa học này?')">🗑 Delete</button>
                    </form>
                </div>
            </li>
        @empty
            <p class="alert alert-warning">No courses found.</p>
        @endforelse
    </ul>
</div>


<script>
    function fillEditForm(id, title, description) {
        document.getElementById('update-course-form').action = `{{ route('courses.update', '') }}/${id}`;
        document.getElementById('edit-title').value = title;
        document.getElementById('edit-description').textContent = description;
        document.getElementById('edit-course-id').value = id;
    }
</script>



@endif






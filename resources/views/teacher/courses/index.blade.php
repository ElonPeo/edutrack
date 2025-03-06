@extends('teacher.app')

@section('teacher-content')
    <h1>Course List</h1>
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createCourseModal">
        Add Course
    </button>
    <!-- Modal Create Course -->
    <div class="modal fade" id="createCourseModal" tabindex="-1" aria-labelledby="createCourseModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createCourseModalLabel">Create New Course</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('courses.store') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" class="form-control" id="title" name="title" required>
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control" id="description" name="description"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="video_url" class="form-label">Video URL</label>
                            <input type="url" class="form-control" id="video_url" name="video_url">
                        </div>
                        <input type="hidden" name="teacher_id" value="{{ Auth::id() }}">
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save Course</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Table -->
    <table class="table mt-3">
        <tr>
            <th>Title</th>
            <th>Description</th>
            <th>Actions</th>
        </tr>
        @foreach($courses as $course)
            <tr>
                <td>{{ $course->title }}</td>
                <td>{{ $course->description }}</td>
                <td>
                    <!-- Button trigger modal -->
                    <button class="btn btn-warning edit-btn" data-bs-toggle="modal" data-bs-target="#editCourseModal"
                        data-id="{{ $course->id }}" data-title="{{ $course->title }}"
                        data-description="{{ $course->description }}" data-video="{{ $course->video_url }}">
                        Edit
                    </button>

                    <!-- Delete Form -->
                    <form action="{{ route('courses.destroy', $course) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

    <!-- Modal Edit Course -->
    <div class="modal fade" id="editCourseModal" tabindex="-1" aria-labelledby="editCourseModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editCourseModalLabel">Edit Course</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="editCourseForm" method="POST">
                        @csrf
                        @method('PUT')
                            
                        <div class="mb-3">
                            <label for="edit-title" class="form-label">Title</label>
                            <input type="text" class="form-control" id="edit-title" name="title" required>
                        </div>
                        <div class="mb-3">
                            <label for="edit-description" class="form-label">Description</label>
                            <textarea class="form-control" id="edit-description" name="description"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="edit-video_url" class="form-label">Video URL</label>
                            <input type="url" class="form-control" id="edit-video_url" name="video_url">
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Update Course</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const editButtons = document.querySelectorAll(".edit-btn");
        editButtons.forEach(button => {
            button.addEventListener("click", function() {
                const id = this.getAttribute("data-id");
                const title = this.getAttribute("data-title");
                const description = this.getAttribute("data-description");
                const video = this.getAttribute("data-video");
                document.getElementById("edit-title").value = title;
                document.getElementById("edit-description").value = description;
                document.getElementById("edit-video_url").value = video;
                document.getElementById("editCourseForm").action = "/courses/" + id;
            });
        });
    });
</script>


@endsection


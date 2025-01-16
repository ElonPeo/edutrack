@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Create Course</h1>
    <form action="{{ route('courses.store') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label for="name" class="block text-sm font-medium text-gray-700">Course Name</label>
            <input type="text" name="name" id="name" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
        </div>
        <div class="mb-4">
            <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
            <textarea name="description" id="description" rows="3" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"></textarea>
        </div>
        <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded">Create</button>
    </form>
</div>
@endsection

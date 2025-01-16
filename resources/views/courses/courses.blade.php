<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'EduTrack') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <link href="{{ asset('build/assets/welcome.css') }}" rel="stylesheet">
        <link href="{{ asset('build/assets/courses.css') }}" rel="stylesheet">
        <style>
            .your-course-background{
                margin-top: 6%;
                padding: 3% 5%;
                height: 700px;
                width: 100%;
                background-color: rgb(196, 217, 255);
            }
            .your-course-background h1{
                font-size: 35px;
                font-weight: bold;
            }
            .your-course-background h2{
                font-size: 20px;
            }
            .your-course-background h2:hover{
                color: #004aad;
            }

            .bold{
                font-weight: bold;
            }

            .your-course{
                margin-top: 30px;
                padding: 30px;
                width: 75%;
                padding: 30px;
                background-color: white;
                border-radius: 15px;
            }
            .your-course-1{
                height: 100%;
                width: 70%;
                display: flex;
                justify-content: space-between;
                align-items: start;
                flex-direction: column;
            }

            .progress {
                width: 600px;
                height: 5px;
                background-color: orangered;
                border-radius: 5px;
            }
            
            .your-course img{
                background-color: aliceblue;
                height: 150px;
                width: 150px;
                object-fit: cover;
                margin-right: 10px;
            }
            
            .progress-button{
                border: solid 1px;
                border-radius: 5px;
                padding: 5px 20px;
            }

            .progress-buttons{
                height: 100%;
                display: flex;
                flex-direction: column;
                justify-content: space-between;
                align-items: end;
            }

            .resume-buttom{
                background-color: white;
                cursor: pointer;
            }

            .cursor-poiter {
                cursor: pointer;
            }
            .resume-buttom:hover{
                background-color: rgb(92, 179, 56);
                border: none;
                color: white;
            }

            .leave-buttom{
                background-color: white;
                cursor: pointer;
            }
            .leave-buttom:hover{
                background-color: rgb(251, 65, 65);
                border: none;
                color: white;
            }

        </style>
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')

            <div class="your-course-background flex flex-col justify-start align-start">
                <div class="flex flex-col justify-start align-start">
                    <h1 >Your Courses</h1>
                    <a class="flex flex-row cursor-poiter">
                        <h2>
                            Your course or create a new one
                        </h2>
                    </a>
                    

                </div>
                <div class="your-course flex flex-row justify-between align-center">
                    <a href=""><img src="{{ asset('assets\images\course\laravel-course.png') }}" alt="Logo"></a>
                    <div class="your-course-1" >
                        <a href="" class="flex flex-col"><h2>Mastering Laravel Framework and PHP</h2><h3>Owner: Trinh Hieu</h3></a>
                        <a class="flex flex-col"><h2 class=" bold">Progress: </h2><div class=" progress"></div></a>
                        <a href=""><h3>You can finish this time</h3></a>
                    </div>
                    <div class=" progress-buttons">
                        <div href="" class=" progress-button resume-buttom">Resume</div>
                        <div href="" class=" progress-button leave-buttom">Leave</div>
                    </div>
                </div>


            <form method="POST" action="{{ route('courses.store') }}">
                @csrf
                <label for="name">Tên khoá học:</label>
                <input type="text" name="name" required>
                <input type="hidden" name="owner_id" value="{{ auth()->user()->id }}">
                <label for="description">Mô tả:</label>
                <textarea name="description"></textarea>
                <button type="submit">Tạo khoá học</button>
            </form>
            </div>







        </div>
    </body>
</html>

@extends('layouts.layout')



@section('body')
    
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>

<style>
    body{
        background: #eee;
    }

    #side_nav{
        background: #000;
        min-width: 250px;
        max-width: 250px;
        transition: all 0.3s;
    }
    .content{
        min-height: 100vh;
        width: 100%;
    }
    hr.h-color{
        background: #eee;
    }

    .sidebar li.active{
        background: #eee;
        border-radius: 8px;
    }

    .sidebar li.active a, .sidebar li.active a:hover {
        color: #000;
    }
    .sidebar li a{
        color: #fff;
    }

    .list-unstyled{
        height: 70px;
        width: 100%;
    }

    .list-unstyled li{
        height: 100%;
        width: 100%;
    }

    .list-unstyled a{
        height: 100%;
        width: 100%; 
    }


    .dashboard-button {
        height: 100%;
        width: 100%;
        border-radius: 7px;
        display: flex;
        justify-content: start;
        align-items: center;
    }



    .logo-div{
        width: 100%;
        height: 60px;
        background-color: white;
    }

    .logo-div img{
        width: 100%;
        height: 100%;
        object-fit: cover;
    }


    @media(max-width: 767px){
    #side_nav{
        margin-left: -250px;
        position: absolute;
        min-height: 100vh;
        z-index: 1;
    }
    #side_nav.active{
        margin-left: 0;
    }
    }


</style>

<div class="main-container d-flex">
    <div class="sidebar sidebar-custome" id="side_nav">
        <div class="header-box px-2 pt-3 pb-4 d-flex justify-content-between">
            <div class="logo-div">
                <img src="{{ asset('..\assets\images\EduTrackLogo.png') }}" alt="Profile">
            </div>
        </div>
        <ul class="list-unstyled px-2">
            <li><a href="{{ route('courses.index') }}" class="text-decoration-none px-3 py-2 d-block"><i class="fal fa-list"></i> 
            <div class="dashboard-button">
                Course
            </div>
            </a></li>
        </ul>
        <ul class="list-unstyled px-2">
            <li><a href="" class="text-decoration-none px-3 py-2 d-block"><i class="fal fa-list"></i> Score</a></li>
        </ul>
        
        <hr class="h-color mx-2">



        <ul class="list-unstyled px-2">
            <li><a href="{{ route('showLogin') }}" class="text-decoration-none px-3 py-2 d-block"><i class="fal fa-list"></i> 
            <div class="dashboard-button">
                Profile
            </div>
            </a></li>
        </ul>

        <ul class="list-unstyled px-2">
            <li>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
                <a href="#" class="text-decoration-none px-3 py-2 d-block"
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="fal fa-bars"></i> Logout
                </a>
            </li>
        </ul>



    </div>
    <div class="content">
        <nav class="navbar navbar-expand-md navbar-light bg-light">
            <div class="container-fluid">
                <div class="d-flex justify-content-between d-md-none d-block">
                 <button class="btn px-1 py-0 open-btn me-2"><i class="fal fa-stream"></i></button>
                    <a class="navbar-brand fs-4" href="#"><span class="bg-dark rounded px-2 py-0 text-white">CL</span></a>
                   
                </div>
                <button class="navbar-toggler p-0 border-0" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fal fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                    <ul class="navbar-nav mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Profile</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="dashboard-content px-3 pt-4">
            <div class="container-fluid">
                @yield('teacher-content')
            </div>
        </div>
        <div class="dashboard-content px-3 pt-4">
            <div class="container-fluid">
                @yield('profile-content')
            </div>
        </div>
    </div>
</div>



<script>
    $(".sidebar ul li").on('click', function () {
        $(".sidebar ul li.active").removeClass('active');
        $(this).addClass('active');
    });
    $('.open-btn').on('click', function () {
        $('.sidebar').addClass('active');

    });
    $('.close-btn').on('click', function () {
        $('.sidebar').removeClass('active');

    })
</script>
@endsection
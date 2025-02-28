
<link href="{{ asset('assets/css/shared.css') }}" rel="stylesheet">
<link href="{{ asset('assets\css\NavigationBar\NavigationBar.css') }}" rel="stylesheet">

<nav class="nav">
    <div class=" blur-layer">
        <div class=" content-layer">
            <div class="logo-div">
                <a href="{{ url('/') }}">
                    <img src="{{ asset('assets\images\EduTrackLogo.png') }}" alt="Logo">
                </a>
            </div>
            <div class="content" >
                <div class="highlight flex flex-col align-center justify-space-between">
                    <a class="decoration-none font-robonto">
                        HOME
                    </a>
                    <div class=""></div>
                </div>
                <div class="highlight flex flex-col align-center justify-space-between">
                    <a class="decoration-none font-robonto">
                        COURSES
                    </a>
                    <div class=" display-none"></div>
                </div>
                <div class="highlight flex flex-col align-center justify-space-between">
                    <a class="decoration-none font-robonto">
                        MENTORS
                    </a>
                    <div class=" display-none"></div>
                </div>
                <div class="highlight flex flex-col align-center justify-space-between">
                    <a class="decoration-none font-robonto">
                        ABOUT US
                    </a>
                    <div class=" display-none"></div>
                </div>
            </div>
            <div class="login-regestor flex flex-row justify-space-between align-center">
                <a href="{{ url('/authentication') }}">
                    <button>Start now</button>
                </a>
            </div>
        </div>
    </div>
</nav>
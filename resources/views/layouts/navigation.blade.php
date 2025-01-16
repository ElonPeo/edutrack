
<div class="navigation-bar">
    <div class="blur-layer"></div>
    <div class="content-layer">
        <div class="logo-div">
            <a href="{{ url('/') }}">
                <img src="{{ asset('assets/images/EduTrackLogo.png') }}" alt="Logo">
            </a>
        </div>
        <div class="navigation-content">
            <div class="navigation-content-1 flex flex-col justify-between align-center">
                <a href="{{ url('/') }}" class="black font-size-m">HOME</a>
                <div class="navigation-content-highlight"></div>
            </div>
            <div class="navigation-content-1 flex flex-col justify-between align-center">
                <a href="{{ url('/courses') }}" class="black font-size-m">COURSES</a>
            </div>
            <div class="navigation-content-1 flex flex-col justify-between align-center">
                <a href="" class="black font-size-m">MENTORS</a>
            </div>
            <div class="navigation-content-1 flex flex-col justify-between align-center">
                <a href="" class="black font-size-m">ABOUT US</a>
            </div>
        </div>

        <!-- Đăng nhập và Đăng ký / Dropdown Settings -->
        @if (Auth::check())
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                            <div>{{ Auth::user()->name }}</div>
                            <div class="ms-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content" class="absolute z-50 bg-white shadow-lg">
                        <x-dropdown-link :href="route('profile.edit')" class="font-size-m black">
                            {{ __('Profile') }}
                        </x-dropdown-link>
                        <form method="POST" action="{{ route('logout') }}" >
                            @csrf
                            <x-dropdown-link :href="route('logout')" class="font-size-m black"
                                onclick="event.preventDefault();
                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>
        @else
            <div class="signup-and-login-buttons">
                <button type="button" class="btn-primary-custom" onclick="location.href='{{ route('login') }}'">Login</button>
                @if (Route::has('register'))
                    <button type="button" class="btn-secondary-custom" onclick="location.href='{{ route('register') }}'">Register</button>
                @endif
            </div>
        @endif
    </div>
</div>

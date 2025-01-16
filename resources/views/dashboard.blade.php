
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="main">
        <div class="get-start">
            <a href="">
                kljfkdsnf
            </a>
            <div class="introduce-div">
                <div class="introduce-div-1 flex flex-row justify-between align-center">
                    <div class="introduce-div-2 flex  justify-center align-center">
                        <div class="introduce-div-4">
                            <a href="">
                                <img src="{{ asset('assets\images\welcomePage\open-book.png') }}" alt="Logo">
                            </a>
                        </div>
                    </div>
                    <div class="introduce-div-3 flex justify-between flex-col">
                        <a class="font-size-30">10K+</a>
                        <a class="font-size-15">TOTAL COURSES</a>
                    </div>
                </div>
                <div class="introduce-div-1 flex flex-row justify-between align-center">
                    <div class="introduce-div-2 flex  justify-center align-center">
                        <div class="introduce-div-4">
                            <a href="">
                                <img src="{{ asset('assets\images\welcomePage\teach.png') }}" alt="Logo">
                            </a>
                        </div>
                    </div>
                    <div class="introduce-div-3 flex justify-between flex-col">
                        <a class="font-size-30">500+</a>
                        <a class="font-size-15">EXPERT MENTORS</a>
                    </div>
                </div>
                <div class="introduce-div-1 flex flex-row justify-between align-center">
                    <div class="introduce-div-2 flex  justify-center align-center">
                        <div class="introduce-div-4">
                            <a href="">
                                <img src="{{ asset('assets\images\welcomePage\students.png') }}" alt="Logo">
                            </a>
                        </div>
                    </div>
                    <div class="introduce-div-3 flex justify-between flex-col">
                        <a class="font-size-30">300K+</a>
                        <a class="font-size-15">STUDENTS GLOBALLY</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

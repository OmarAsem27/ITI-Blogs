@extends('layouts.app')

@section('content')
    {{-- <div class="container bg-red-400 mt-32 ">
        <div class="max-w-md bg-white border border-gray-200 rounded-lg shadow text-center m-auto">
            <div class="">
                <div class="">
                    <div class="">
                        <div class="card-body">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif

                            {{ __('You are logged in!') }}
                            <h1 class=""> Welcome, <span class="text-red-600 font-medium">{{ Auth::user()->name }}
                                    <span> </h1>
                            <img src="{{ asset('images/users/' . Auth::user()->image) }}" width="100" height="100"
                                alt="">
                            <a href="{{ route('posts.create') }}"
                                class=" bg-green-600 hover:bg-green-800 font-medium rounded-lg text-md inline-flex text-white text-center px-5 py-2.5 m-2">
                                Create post now!</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}

    <!-- component -->
    <div class="container  ">
        <main class="grid min-h-screen w-full place-items-center ">
            <div
                class="absolute left-1/2 top-1/2 h-96 w-80 -translate-x-1/2 -translate-y-1/2 rotate-6 rounded-2xl bg-gray-200">
            </div>
            <img src="{{ Auth::user()->image }}">
            <div
                class="absolute left-1/2 top-1/2 h-96 w-80 -translate-x-1/2 -translate-y-1/2 rotate-6 space-y-6 rounded-2xl bg-gray-100 p-6 transition duration-300 hover:rotate-0">
                <div class="flex justify-end">
                    <div class="h-4 w-4 rounded-full "></div>
                </div>

                <header class="text-center text-xl font-extrabold text-gray-600"></header>
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                <div>
                    <p class="text-center text-5xl font-extrabold text-gray-900">{{ Auth::user()->name }}</p>
                    <p class="text-center text-4xl font-extrabold text-[#FE5401]">Share your thoughts now!</p>
                </div>

                <footer class="mb-10 flex justify-center">

                    <a href="{{ route('posts.create') }}"
                        class="shadow-lg shadow-[#FE5401]     bg-green-600 hover:bg-green-800 font-medium rounded-lg text-md inline-flex text-white text-center px-5 py-2.5 m-2">
                        <span>Post</span>
                        <i class="fas fa-hand-peace text-xl mx-2"></i>
                    </a>
                </footer>
            </div>
        </main>
    </div>
@endsection

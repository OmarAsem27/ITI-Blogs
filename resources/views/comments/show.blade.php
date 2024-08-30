@extends('layouts.app')

@section('content')
    <a href="#"
        class="block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">

        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $comment->body }}</h5>
        <p class="font-normal text-gray-700 dark:text-gray-400">Here are the biggest enterprise technology acquisitions of
            2021 so far, in reverse chronological order.</p>
    </a>

    <a href="{{ route('comments.index') }}"
        class="text-white text-sm inline-block bg-gray-700 hover:bg-gray-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg px-4 py-2 mt-4">
        Back</a>
@endsection

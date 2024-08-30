@extends('layouts.app')

@section('content')
    <a href="{{ route('comments.create') }}"
        class="text-white text-sm inline-block bg-gray-700 hover:bg-gray-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg px-4 py-2">
        Create Comment</a>
    @foreach ($comments as $comment)
        <p> Comment: {{ $comment->body }} </p>
    @endforeach
@endsection

@extends('layouts.app')

@section('content')
    <div class="border border-gray-400 rounded-lg m-16">

        <div
            class=" border-r border-b border-l border-gray-400 lg:border-l-0 lg:border-t lg:border-gray-400 bg-white rounded-b lg:rounded-b-none lg:rounded-r  flex flex-col justify-between leading-normal">
            <div class="mb-8 bg-gray-400">
                <p class="text-sm text-gray-600 flex items-center p-3">
                    <svg class="fill-current text-gray-500 w-3 h-3 mr-2" xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 20 20">
                        <path
                            d="M4 8V6a6 6 0 1 1 12 0v2h1a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-8c0-1.1.9-2 2-2h1zm5 6.73V17h2v-2.27a2 2 0 1 0-2 0zM7 6v2h6V6a3 3 0 0 0-6 0z" />
                    </svg>
                    Members only
                </p>
                <div class=" text-gray-900 font-bold text-xl m-2   ">Title: {{ $post->title }}
                    <a href="{{ route('comments.create', $post->id) }}"
                        class="focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2  ">Comment</a>
                </div>
            </div>
            <div class="m-4">
                <p class="text-gray-700 text-base p-3"> <strong>Description: </strong> {{ $post->description }}</p>
                <img src="{{ asset('images/posts/' . $post->image) }}" width="300" height=auto alt="">
            </div>
            <div class="flex items-center">
                <div class="text-sm p-3">
                    <p class="text-gray-900 leading-none">Posted by {{ ucfirst($post->posted_by) }}</p>
                    <p class="text-gray-600">{{ $post->created_at->format('d/m/Y') }}</p>
                </div>
            </div>
            <div>
                @dump($post->comments)
            </div>


        </div>
    </div>
@endsection

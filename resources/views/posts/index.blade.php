@extends('layouts.app')

@section('content')
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 p-4">
        {{-- <div class="text-center">
            <a href="{{ route('posts.create') }}">
                <button
                    class="focus:outline-none text-white bg-green-700 hover:bg-green-800 font-medium rounded-lg px-5 py-2.5 me-2 m-5 ">
                    Create Post </button>
            </a>
        </div> --}}
        {{-- <a href="{{ route('posts.restore') }}">
        <button type="submit"
            class="focus:outline-none text-white bg-blue-700 hover:bg-blue-800 font-medium rounded-lg px-5 py-2.5 me-2 m-5 ">
            Restore </button>
    </a> --}}
        @foreach ($posts as $post)
            <div class="bg-white rounded-lg shadow-md p-4 flex flex-col">
                <!-- Image -->
                <div class="mb-4">
                    <img src="{{ asset('images/posts/' . $post->image) }}" alt="{{ $post->title }}"
                        class="w-full h-48 object-cover rounded-lg">
                </div>
                <!-- Title -->
                <h2 class="text-xl font-semibold mb-2">{{ $post->title }}</h2>
                <!-- Body -->
                <p class="text-gray-700 mb-2">{{ $post->description }}</p>
                {{-- <p class="text-gray-700 mb-2">{{ Str::limit($post->description, 100) }}</p> --}}
                <!-- Posted By -->
                <p class="text-gray-500 mb-4">Posted by: {{ $post->creator->name ?? $post->posted_by }}</p>
                <!-- Slug -->
                <p class="text-gray-500 mb-2">Slug: {{ $post->slug }}</p>
                <!-- Created At -->
                <p class="text-gray-500 mb-4">Created at: {{ $post->created_at->format('d/m/Y') }}</p>
                <!-- Actions -->
                <div class="   space-x-2 mt-auto">
                    <a href="{{ route('posts.show', $post->id) }}"
                        class="bg-purple-700 hover:bg-purple-800 text-white font-medium rounded-lg px-4 py-2">View</a>
                    <a href="{{ route('posts.edit', $post->id) }}"
                        class="bg-blue-700 hover:bg-blue-800 text-white font-medium rounded-lg px-4 py-2">Edit</a>
                    <a href="{{ route('comments.create', $post->id) }}"
                        class="bg-yellow-400 hover:bg-yellow-500 text-white font-medium rounded-lg px-4 py-2">Comment</a>
                    <button data-modal-target="{{ 'popup-modal' . $post->id }}"
                        data-modal-toggle="{{ 'popup-modal' . $post->id }}"
                        class="bg-red-700 hover:bg-red-800 text-white font-medium rounded-lg px-4 py-2">Delete</button>
                </div>
                <!-- Modal (for delete confirmation) -->
                <div id="{{ 'popup-modal' . $post->id }}" tabindex="-1"
                    class="hidden overflow-y-auto fixed top-0 right-0 left-0 z-50 justify-center items-center w-full h-full max-h-full">
                    <div class="relative p-4 w-full max-w-md max-h-full">
                        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                            <button type="button"
                                class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                data-modal-hide="{{ 'popup-modal' . $post->id }}">
                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 14 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                </svg>
                                <span class="sr-only">Close modal</span>
                            </button>
                            <div class="p-4 md:p-5 text-center">
                                <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                </svg>
                                <h3 class="mb-5 text-lg font-normal text-gray-500">Are you sure you want to delete this
                                    Post?</h3>
                                <div class="flex gap-2 items-center justify-center">
                                    <form method="post" action="{{ route('posts.destroy', $post->id) }}">
                                        @csrf
                                        @method('delete')
                                        <button data-modal-hide="{{ 'popup-modal' . $post->id }}" type="submit"
                                            class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">Yes,
                                            I'm sure</button>
                                    </form>
                                    <button data-modal-hide="{{ 'popup-modal' . $post->id }}" type="button"
                                        class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">No,
                                        cancel</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach


    </div>
    <div class=" ">
        {{ $posts->links() }}
    </div>
@endsection




{{-- ---------------------------------------------------------------------- --}}


{{--
<style>
    div {
        padding: 2rem;
        background-color: #888;
        border-radius: 6px;
    }
</style>
<button popovertarget="deleteModal">Delete</button>
<div id="deleteModal" popover>
    <h2>Are you sure you want to delete?</h2>
    <div>
        <button popovertarget="deleteModal" popoveraction="hide">
            Yes</button><button popovertarget="deleteModal" popoveraction="hide">
            No
        </button>
    </div>
</div> --}}

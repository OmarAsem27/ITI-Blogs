@extends('layouts.app')

@section('content')
    <a href="{{ route('posts.create') }}">
        <button
            class="focus:outline-none text-white bg-green-700 hover:bg-green-800 font-medium rounded-lg px-5 py-2.5 me-2 m-5 ">
            Create Post </button>
    </a>
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3 border"> ID</th>
                <th scope="col" class="px-6 py-3 border"> Image</th>
                <th scope="col" class="px-6 py-3 border"> Title</th>
                <th scope="col" class="px-6 py-3 border"> Description</th>
                <th scope="col" class="px-6 py-3 border"> Posted By</th>
                <th scope="col" class="px-6 py-3 border"> Created At</th>
                <th scope="col" class="px-6 py-3 border">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($posts as $post)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <td class="px-6 py-4 border ">{{ $post->id }}</td>
                    <td class="px-6 py-4 border "><img src="{{ asset('images/posts/' . $post->image) }}" width="200">
                    </td>
                    <td class="px-6 py-4 border ">{{ $post->title }}</td>
                    <td class="px-6 py-4 border ">{{ $post->description }}</td>
                    <td class="px-6 py-4 border ">{{ $post->posted_by }}</td>
                    <td class="px-6 py-4 border ">{{ $post->created_at->format('d/m/Y') }}</td>
                    <td class="border text-center">
                        {{-- View button --}}
                        <a href="{{ route('posts.show', $post->id) }}"
                            class="text-white inline-block bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg px-5 py-2.5 me-2 m-2 ">View</a>
                        {{-- Edit button --}}
                        <a href="{{ route('posts.edit', $post->id) }}"
                            class="text-white inline-block bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg px-5 py-2.5 me-2 m-2 ">Edit</a>
                        {{-- Delete button --}}
                        <form method="post" action="{{ route('posts.destroy', $post->id) }}">
                            @csrf
                            @method('delete')
                            <button type="submit"
                                class="text-white inline-block bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg px-5 py-2.5 me-2 m-2 ">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="">
        {{ $posts->links() }}
    </div>              
@endsection




{{-- ---------------------------------------------------------------------- --}}

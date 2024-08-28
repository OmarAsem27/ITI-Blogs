@extends('layouts.app')

@section('content')
    @if ($errors->any())
        <div class="p-4 mb-4  text-red-800 rounded-lg bg-red-50 ">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form class="max-w-sm mx-auto m-5" enctype="multipart/form-data" method="POST" action="{{ route('posts.update', $post) }}">
        @csrf
        @method('put')
        <div class="mb-5">
            {{-- <label for="base-input" class="block mb-2 text-sm font-medium text-black-900">Title</label> --}}
            <label for="base-input" class="block mb-2 text-sm font-medium text-black-900">Title</label>
            <input type="text" id="base-input" placeholder="Leave a title..." value="{{ $post->title }}" name="title"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-dark-500 focus:border-blue-500 block w-full p-2.5 ">
        </div>
        <div class="mb-5">
            <label for="message" class="block mb-2 text-sm font-medium text-black-900">Description</label>
            <textarea id="message" rows="12" name="description"
                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-dark-500 focus:border-blue-500 "
                placeholder="Leave a description...">{{ $post->description }}</textarea>
        </div>
        <div class="mb-5">
            <label class="block mb-2 text-sm font-medium text-black-900 " for="file_input">Upload file</label>
            <input
                class="p-2.5 block w-full text-md text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50  focus:outline-none focus:ring-dark-500"
                id="file_input" type="file" name='image'>
        </div>
        {{-- start select ------------------------------------------------ --}}
        <div class="mb-5">
            <label for="creators" class="block mb-2 text-sm font-medium text-black-900">Post Creator</label>
            <select name="posted_by" id="creators"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-dark-500  block w-full p-2.5  ">
                <option value="creator" disabled>{{ $post->posted_by }}</option>
                <option value="ahmed">Ahmed</option>
                <option value="omar">Omar</option>
                <option value="hossam">Hossam</option>
                <option value="mahmoud">Mahmoud</option>
            </select>
        </div>
        {{-- end select ------------------------------------------------ --}}
        {{-- create BUTTON --}}
        <button type="submit"
            class="text-white bg-blue-700 hover:bg-blue-800 font-medium rounded-lg px-5 py-2.5 text-center m-4">Update</button>
    </form>
@endsection

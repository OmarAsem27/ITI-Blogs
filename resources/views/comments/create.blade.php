@extends('layouts.app')

@section('content')
    <form class="max-w-sm mx-auto" action="{{ route('comments.store') }}" method="post">
        @csrf
        <div class="mt-32 text-center">
            <div class="mt-5">

                <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Add Comment</label>
                <textarea id="message" rows="8" name="body"
                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Leave a comment..."></textarea>
            </div>
            <div class="mt-5">
                <label for="">Commentable ID </label>
                <input type="text">
                <label for="">Commentable Type</label>
                <input type="text">
            </div>

            <div class="mt-5">
                <label for="creators" class="block mb-2 text-sm font-medium text-black-900">Comment Creator</label>
                <select name="posted_by" id="creators"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-dark-500  block w-full p-2.5  ">
                    <option disabled selected value=""> Please choose creator</option>
                    @foreach ($creators as $creator)
                        <option value="{{ $creator->id }}"> {{ $creator->name }}</option>
                    @endforeach
                </select>
            </div>

            {{-- <div class="mb-3">
            @error('description')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div> --}}
            <button type="submit"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mt-8 focus:outline-none ">Add</button>
        </div>
    </form>
@endsection

<!DOCTYPE html>
<html lang="en" class="">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js']) <title>Day 3 </title>
</head>

<body class="">

    <nav class="bg-gray-300 border-gray-200 ">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
            <a href="{{ route('posts.index') }}" class="flex items-center space-x-3 rtl:space-x-reverse">
                <img src="https://iti.gov.eg/assets/images/ColoredLogo.svg" class="h-6" alt="Flowbite Logo" />
                <span class="self-center text-2xl font-semibold whitespace-nowrap text-gray-700">Posts</span>
            </a>
            <button data-collapse-toggle="navbar-default" type="button"
                class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 "
                aria-controls="navbar-default" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 17 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M1 1h15M1 7h15M1 13h15" />
                </svg>
            </button>
            <div class="bg-transparent hidden w-full md:block md:w-auto" id="navbar-default">
                <ul
                    class="font-medium flex flex-col p-4 md:p-0  border border-gray-500 rounded-lg bg-gray-600 md:flex-row md:space-x-8 rtl:space-x-reverse  ">
                    <li >
                        <a href="{{ route('posts.index') }}"
                            class="text-white text-sm inline-block bg-gray-700 hover:bg-gray-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg px-4 py-2 "
                            aria-current="page">All Posts</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mx-auto">
        @yield('content')
    </div>




</body>

</html>

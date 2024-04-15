<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>To-Do Task</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-purple-300">
    <h1 class="text-2xl p-6 w-9/12 mx-auto text-center text-white bg-green-600">
        This is my first Home page of to do task.
    </h1>
    @if (session()->has('message'))
        <div class="bg-green-200 text-green-700 py-2 px-4 mb-4 rounded">
            {{ session()->get('message') }}
        </div>
    @endif
    <div class="w-9/12 mx-auto flex justify-center gap-10 mt-10">
        <a href="{{ route('create') }}">
            <button class="p-2 rounded-md text-lg bg-cyan-600 hover:bg-cyan-700">Create New Task</button>
        </a>
        <a href="{{ route('create_student') }}">
            <button class="p-2 rounded-md text-lg bg-cyan-600 hover:bg-cyan-700">Create Student List</button>
        </a>
        @auth
            <a href="{{ route('view_task') }}">
                <button class="p-2 rounded-md text-lg bg-cyan-600 hover:bg-cyan-700">View All Task</button>
            </a>
            <a href="{{ route('view_student') }}">
                <button class="p-2 rounded-md text-lg bg-cyan-600 hover:bg-cyan-700">View All Student</button>
            </a>
        @endauth
    </div>
    <!-- Login and Register Buttons -->
    <div class="w-9/12 mx-auto mt-10 flex justify-center gap-5">
        @auth <!-- Check if user is authenticated -->
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit"
                    class="p-2 rounded-md text-lg bg-gray-800 text-white hover:bg-gray-700">Logout</button>
            </form>
        @else
            <a href="{{ route('login') }}">
                <button class="p-2 rounded-md text-lg bg-gray-800 text-white hover:bg-gray-700">Login</button>
            </a>
            <a href="{{ route('register') }}">
                <button class="p-2 rounded-md text-lg bg-gray-800 text-white hover:bg-gray-700">Register</button>
            </a>
        @endauth
    </div>
</body>

</html>

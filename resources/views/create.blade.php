<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create New Task</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-100">
    <div class="container mx-auto py-8">
        <h1 class="text-3xl font-bold mb-4">Create New Task</h1>

        @if ($errors->any())
            <div class="bg-red-200 text-red-700 py-2 px-4 mb-4 rounded">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if (session()->has('message'))
            <div class="bg-green-200 text-green-700 py-2 px-4 mb-4 rounded">
                {{ session()->get('message') }}
            </div>
        @endif

        <form action="{{ route('store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="name" class="block font-semibold">Name:</label>
                <input type="text" id="name" name="name" required class="border border-gray-300 rounded-md px-3 py-2 w-full">
            </div>
            <div class="mb-4">
                <label for="father_name" class="block font-semibold">Father's Name:</label>
                <input type="text" id="father_name" name="father_name" required class="border border-gray-300 rounded-md px-3 py-2 w-full">
            </div>
            <div class="mb-4">
                <label for="mother_name" class="block font-semibold">Mother's Name:</label>
                <input type="text" id="mother_name" name="mother_name" required class="border border-gray-300 rounded-md px-3 py-2 w-full">
            </div>
            <div class="mb-4">
                <label for="phone_number" class="block font-semibold">Phone Number:</label>
                <input type="text" id="phone_number" name="phone_number" required class="border border-gray-300 rounded-md px-3 py-2 w-full">
            </div>
            <div class="flex justify-center mt-6 gap-10">
                <button type="submit" class="bg-blue-500 text-center text-white py-2 px-4 rounded-md hover:bg-blue-600">
                    Create Task
                </button>
                <a href="{{ route('index') }}" class="bg-rose-600 text-white text-xl p-2 rounded-md text-center">
                    Home
                </a>
            </div>
        </form>
    </div>
</body>

</html>

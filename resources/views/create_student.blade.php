<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Student Information</title>
    @vite('resources/css/app.css')
</head>

<body class="container mx-auto py-8">
    <h1 class="bg-slate-700 text-white text-2xl mb-10 text-center p-3">Input Students Information</h1>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('createStudent') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label for="name" class="block font-semibold">Name:</label>
            <input type="text" id="name" name="name" required
                class="border border-gray-300 rounded-md px-3 py-2 w-full">
        </div>
        <div class="mb-4">
            <label for="father_name" class="block font-semibold">Father's Name:</label>
            <input type="text" id="father_name" name="father_name" required
                class="border border-gray-300 rounded-md px-3 py-2 w-full">
        </div>
        <div class="mb-4">
            <label for="mother_name" class="block font-semibold">Mother's Name:</label>
            <input type="text" id="mother_name" name="mother_name" required
                class="border border-gray-300 rounded-md px-3 py-2 w-full">
        </div>
        <div class="mb-4">
            <label for="phone_number" class="block font-semibold">Phone Number:</label>
            <input type="number" id="phone_number" name="phone_number" required
                class="border border-gray-300 rounded-md px-3 py-2 w-full">
        </div>
        <div class="mb-4">
            <label for="email" class="block font-semibold">Email:</label>
            <input type="text" id="email" name="email" required
                class="border border-gray-300 rounded-md px-3 py-2 w-full">
        </div>
        <div class="mb-4">
            <label for="gpa" class="block font-semibold">GPA:</label>
            <input type="number" id="gpa" name="gpa" step="0.01" required
                class="border border-gray-300 rounded-md px-3 py-2 w-full">
        </div>


        <div class="flex justify-center mt-6 gap-10">
            <button type="submit" class="bg-blue-500 text-center text-white py-2 px-4 rounded-md hover:bg-blue-600">
                Create Student
            </button>
            <a href="{{ route('index') }}" class="bg-rose-600 text-white text-xl p-2 rounded-md text-center">
                Home
            </a>
        </div>
    </form>
</body>

</html>

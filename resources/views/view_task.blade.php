<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Task List</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100">

<div class="container mx-auto px-4 py-8">
    <h1 class="text-2xl font-semibold mb-4">Task List</h1>

    <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50">
            <tr>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Father's Name</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Mother's Name</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Phone Number</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Action</th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            @foreach ($tasks as $task )
            <tr>
                <td class="px-6 py-4 whitespace-nowrap">{{ $task->id }}</td>
                <td class="px-6 py-4 whitespace-nowrap">{{ $task->name }}</td>
                <td class="px-6 py-4 whitespace-nowrap">{{ $task->father_name }}</td>
                <td class="px-6 py-4 whitespace-nowrap">{{ $task->mother_name }}</td>
                <td class="px-6 py-4 whitespace-nowrap">{{ $task->phone_number }}</td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <a href="{{ route('edit_task', $task->id) }}" class="bg-blue-500 text-center text-white py-2 px-4 rounded-md hover:bg-blue-600">Edit</a>
                    <a href="{{ route('delete_task', $task->id) }}" class="bg-red-500 text-center text-white py-2 px-4 rounded-md hover:bg-red-600">Delete</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="flex justify-center mt-6">
        <a href="{{ route('index') }}" class="bg-rose-600 text-white text-xl p-2 rounded-md text-center">
            Home
        </a>
    </div>
</div>

</body>
</html>

<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::get('/', [TaskController::class, 'Index'])->name('index');

Route::get('/create-new', [TaskController::class, 'Create'])->name('create');
Route::get('/login', [HomeController::class, 'Index'])->name('login');
Route::post('/login', [HomeController::class, 'Login'])->name('login');
Route::post('/logout', [HomeController::class, 'Logout'])->name('logout');

Route::get('/register', [HomeController::class, 'RegisterView'])->name('register');
Route::post('/register', [HomeController::class, 'Register'])->name('register');

// Define store route for storing new task
Route::post('/tasks', [TaskController::class, 'Store'])->name('store');


Route::get('/create-student', [StudentController::class, 'Student'])->name('create_student');
Route::post('/create-student', [StudentController::class, 'CreateStudent'])->name('createStudent');
Route::get('/view-student', [StudentController::class,'ViewStudent'])->name('view_student');
Route::get('/view-task', [TaskController::class, 'ViewTask'])->name('view_task');

Route::get('/edit-task/{id}', [TaskController::class, 'EditTask'])->name('edit_task');
Route::post('/update-task', [TaskController::class, 'UpdateTask'])->name('update_task');

Route::get('/edit-student/{id}', [StudentController::class, 'EditStudent'])->name('edit_student');
Route::post('/update-student', [StudentController::class, 'UpdateStudent'])->name('update_student');

Route::get('/delete-student/{id}', [StudentController::class, 'DeleteStudent'])->name('delete_student');

Route::get('/delete-task/{id}', [TaskController::class, 'DeleteTask'])->name('delete_task');


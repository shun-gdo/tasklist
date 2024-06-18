<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\TasksController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [TaskController::class, 'index']);
Route::resource('tasks',TasksController::class);

Route::get('tasks/{id}',[TasksController::class,'show']);
Route::get('tasks',[TasksController::class,'index'])->name('tasks.index');

Route::post('tasks',[TasksController::class,'store']);
Route::post('tasks/create',[TasksController::class,'create']);

Route::put('tasks/{id}',[TasksController::class,'update']);
Route::delete('tasks/{id}',[TasksController::class,'destroy']);

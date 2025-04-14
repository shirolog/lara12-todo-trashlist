<?php

use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/tasks', [TaskController::class, 'index'])
->name('tasks.index');
Route::post('/tasks', [TaskController::class, 'store'])
->name('tasks.store');
Route::delete('/tasks/{task}', [TaskController::class, 'destroy'])
->name('tasks.destroy');


Route::get('/tasks/trash', [TaskController::class, 'trash'])->name('tasks.trash');
Route::put('/tasks/{task}/recover', [TaskController::class, 'recover'])->name('tasks.recover');
Route::delete('/tasks/{task}', [TaskController::class, 'deleteTrash'])->name('tasks.deleteTrash');

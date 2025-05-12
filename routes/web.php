<?php

use App\Http\Controllers\TaskController;
use App\Http\Controllers\UrlController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });


Route::redirect('/', '/tasks');

Route::get('/tasks', [TaskController::class, 'index'])
->name('tasks.index');
Route::post('/tasks', [TaskController::class, 'store'])
->name('tasks.store');
Route::put('/tasks/{task}', [TaskController::class, 'maskAsDeleted'])
->name('tasks.maskAsDeleted');



Route::get('/tasks/trash', [TaskController::class, 'trash'])->name('tasks.trash');
Route::put('/tasks/{task}/recover', [TaskController::class, 'recover'])->name('tasks.recover');
Route::delete('/tasks/{task}', [TaskController::class, 'deleteTrash'])->name('tasks.deleteTrash');


//short url app

Route::get('/urls', [UrlController::class, 'index'])->name('urls.index');

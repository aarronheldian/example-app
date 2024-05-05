<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\ProjectController;

Route::get('/', function () {
    return view('home', [
        "title" => "Home",
    ]);
})->name('home');

Route::get('/project', [ProjectController::class, 'index'])->name('project.index');
Route::get('/project/create', [ProjectController::class, 'create'])->name('project.create');
Route::post('/project', [ProjectController::class, 'store'])->name('project.store');
Route::get('/project/{project}', [ProjectController::class, 'show'])->name('project.show');
Route::get('/project/{project}/edit', [ProjectController::class, 'edit'])->name('project.edit');
Route::put('/project/{project}', [ProjectController::class, 'update'])->name('project.update');
Route::delete('/project/{project}', [ProjectController::class, 'destroy'])->name('project.destroy');

Route::get('/project/{project}/task/create', [TaskController::class, 'create'])->name('task.create');
Route::post('/task', [TaskController::class, 'store'])->name('task.store');
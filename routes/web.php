<?php

use App\Http\Controllers\JobController;
use App\Http\Controllers\RegisterdUserController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;


Route::get('/', [JobController::class, 'index']);

// dd(phpinfo());

Route::get('/search', SearchController::class);
Route::get('/tags/{tag:name}', TagController::class);

Route::middleware('guest')->group(function () {
    Route::get('/register', [RegisterdUserController::class, 'create']);
    Route::post('/register', [RegisterdUserController::class, 'store']);
    Route::get('/login', [SessionController::class, 'create'])->name('login');
    Route::post('/login', [SessionController::class, 'store']);
});


Route::middleware(['auth'])->group(function () {
    Route::post('/logout', [SessionController::class, 'destroy']);

    Route::get('/jobs/create', [JobController::class, 'create'])->can('create', 'task');

    Route::get('/jobs/{job}', [JobController::class, 'show']);

    // Route::get('/task', [TaskController::class, 'index']);

    // Route::get('/task/create', [TaskController::class, 'create']);

    // Route::get('/task/{task}', [TaskController::class, 'show']);
});
// Route::post('/task', [TaskController::class, 'store']);
// Route::patch('/task/{task}', [TaskController::class, 'update']);

Route::controller(TaskController::class)->group(function () {
    Route::get('/task', 'index')->middleware('auth');

    Route::get('/task/create', 'create')
        ->middleware('auth', 'create_task');
    // ->can('create');

    Route::get('/task/{task}', 'show')->middleware('auth');
    Route::post('/task', 'store')->middleware('auth');
    Route::patch('/task/{task}', 'update')->middleware('auth');
});

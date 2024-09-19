<?php


use App\Http\Controllers\DailyTaskController;
use App\Http\Controllers\RegisterdUserController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\Tasks\TaskController;
use Illuminate\Support\Facades\Route;


Route::get('/search', SearchController::class);

Route::get('/tags/{tag:name}', TagController::class);
    Route::get('/register', [RegisterdUserController::class, 'create'])->middleware(['auth','register']);
//_______________________________AUTH_________________________________________//
Route::middleware('guest',)->group(function () {
    Route::post('/register', [RegisterdUserController::class, 'store']);
    Route::get('/login', [SessionController::class, 'create'])->name('login');
    Route::post('/login', [SessionController::class, 'store']);
});
Route::post('/logout', [SessionController::class, 'destroy'])->middleware('auth');
//_______________________________AUTH_________________________________________//
//_______________________________TASK_________________________________________//
Route::controller(TaskController::class)->group(function () {
    Route::get('/', 'index')->middleware('auth');

    Route::get('/task/create', 'create')
        ->middleware('auth');
    // ->can('create');
    Route::get('/task/{task}', 'show')->middleware('auth');
    Route::get('/task/{task}/edit', 'edit')->middleware('auth');
    Route::post('/task/store', 'store')->middleware('auth');
    Route::patch('/task/{task}', 'update')->middleware('auth');
});
//_______________________________TASK_________________________________________//
//_______________________________PROJECT______________________________________//
Route::controller(ProjectController::class)->group(function (){
    Route::get('/project' , 'index')->middleware('auth');
});
//_______________________________PROJECT______________________________________//
//_______________________________Daily Tasks______________________________________//
Route::get('/daily_tasks/create', [DailyTaskController::class,'create']);
Route::post('/daily_task/store', [DailyTaskController::class,'store']);

//_______________________________Daily Tasks______________________________________//



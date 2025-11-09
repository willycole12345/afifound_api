<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserCreationController;
use App\Http\Controllers\TaskController;


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

  Route::post('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/createUser', [UserCreationController::class, 'create'])->name('createUser');


Route::group([
    "middleware"=>['auth:sanctum']
],function () {

  Route::post('/CreateTask', [TaskController::class, 'store'])->name('CreateTask');
    Route::get('/Task', [TaskController::class, 'TaskList'])->name('Task');
  Route::get('/Task/{userid}', [TaskController::class, 'view'])->name('Task');
    Route::get('/TaskStatus/{status}', [TaskController::class, 'TaskStatus'])->name('TaskStatus');
  Route::post('/updateTask/{recordID}', [TaskController::class, 'update'])->name('Task');
  Route::post('/delete/{recordID}', [TaskController::class, 'delete'])->name('Task');

});
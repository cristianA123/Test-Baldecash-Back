<?php

use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


  Route::post('/login', [UserController::class, 'authenticate']);
  
  Route::get('/users', [UserController::class, 'getUsers']);
  
  
    Route::group(['middleware' => ['jwt.verify']], function() {
    Route::post('/user/create', [UserController::class, 'createuser']);
    Route::put('/user/{id}', [UserController::class, 'updateUser'])->middleware(['CheckAdminRole']);
    Route::delete('/user/{id}', [UserController::class, 'deleteUser'])->middleware(['CheckAdminRole']);

});
<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// All routes here start with /api

Route::get('/profiles', [ProfileController::class, 'index']);         // list all

Route::get('/profiles/{id}', [ProfileController::class, 'show']);     // get one

Route::post('/profiles', [ProfileController::class, 'store']);        // create

Route::put('/profiles/{id}', [ProfileController::class, 'update']);   // update
Route::patch('/profiles/{id}', [ProfileController::class, 'update']); // update

Route::delete('/profiles/{id}', [ProfileController::class, 'destroy']); // delete

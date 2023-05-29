<?php

use Illuminate\Support\Facades\Route;

Route::resource('projects', App\Http\Controllers\ProjectController::class);
Route::resource('projects/{id}/membres', App\Http\Controllers\ProjectUserController::class);
Route::resource('demande', App\Http\Controllers\DemandeController::class);
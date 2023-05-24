<?php

use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OptionTtmController;

Route::middleware(['auth'])->group(function(){
    Route::resource('optionsttm', OptionTtmController::class);
});

Auth::routes();
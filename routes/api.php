<?php

use App\Http\Controllers\EventController;
use Illuminate\Support\Facades\Route;

Route::middleware('jwt')->group(function () {
    Route::get('/', function () {
        return json_encode(jwt_user());
    });

    Route::apiResource('events', EventController::class);
});

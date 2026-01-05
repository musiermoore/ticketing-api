<?php

use Illuminate\Support\Facades\Route;

Route::middleware('jwt')->get('/', function () {
    return json_encode(jwt_user());
});

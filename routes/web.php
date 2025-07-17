<?php

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return ["status" => "ok3"];
});

Route::get('/bonbon', function() {
    return Bonbon::first();
});

Route::post('/bonbon', function() {
    return Bonbon::create(["value" => Str::random(5)]);
});



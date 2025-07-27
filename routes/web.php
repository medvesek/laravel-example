<?php

use App\Models\Bonbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return ["status" => "ok3"];
});


Route::get('/bonbon', function() {
    $bonbon = Bonbon::first();
    if(!$bonbon) {
        return Bonbon::create(["value" => Str::random(5)]);
    }
    return $bonbon;
});

Route::post('/bonbon', function() {
    return Bonbon::create(["value" => Str::random(5)]);
})->withoutMiddleware([Illuminate\Foundation\Http\Middleware\VerifyCsrfToken::class]);


Route::get('/opcache', function() {
    //return opcache_get_status();
});

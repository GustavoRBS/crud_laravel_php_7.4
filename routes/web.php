<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactsController;

Route::controller(ContactsController::class)->group(function () {
    Route::get('', 'index');
});

Route::controller(ContactsController::class)->middleware('auth')->group(function () {
    Route::resource('contacts', ContactsController::class);
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/index', function () {
        Route::controller(ContactsController::class)->group(function () {
            Route::get('', 'index');
        });
    });
});

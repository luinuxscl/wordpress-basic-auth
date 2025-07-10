<?php

use Illuminate\Support\Facades\Route;
use Luinuxscl\WordpressBasicAuth\Http\Controllers\WordpressController;

Route::middleware(['web'])->group(function () {
    Route::get('/wordpress/create', [WordpressController::class, 'create'])
    ->name('wordpress.create');
});

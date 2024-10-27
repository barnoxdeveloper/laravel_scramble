<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;

Route::prefix('v1')->group(function () {
    Route::resource('books', BookController::class);
});

<?php

use Dangkhoa\Plugins\User\src\Http\Controllers\Web\Frontend\User\UserController;
use Illuminate\Support\Facades\Route;

Route::name('user_plugin.')->prefix('user')->group(function () {
    Route::resource('user', UserController::class)->only(['index']);
});


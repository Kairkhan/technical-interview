<?php

use App\Modules\User\Controllers\Api\v1\UsersController;
use Illuminate\Support\Facades\Route;

Route::get("/v1/users", [UsersController::class, 'index'])
    ->name('v1.users.index');

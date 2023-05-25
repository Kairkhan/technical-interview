<?php

declare(strict_types=1);

namespace App\Modules\User\Providers;

use App\Modules\User\Contracts\Services\UserService as UserServiceContract;
use App\Modules\User\Services\UserService;
use Illuminate\Support\ServiceProvider;

final class BindServiceProvider extends ServiceProvider
{
    public array $bindings = [
        UserServiceContract::class => UserService::class
    ];
}

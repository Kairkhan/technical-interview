<?php

declare(strict_types=1);

namespace App\Modules\User\Providers;

use App\Modules\Notification\Contracts\Queries\UserByIdQuery;
use App\Modules\User\Contracts\Queries\GetAllUsersQuery;
use App\Modules\User\Queries\Cache\UserCacheDecorator;
use App\Modules\User\Queries\Eloquent\UserQuery;
use Illuminate\Support\ServiceProvider;

final class QueryServiceProvider extends ServiceProvider
{
    public array $bindings = [
        GetAllUsersQuery::class => UserCacheDecorator::class,
        UserByIdQuery::class    => UserQuery::class
    ];

    public function register(): void
    {
       $this->app->when(UserCacheDecorator::class)
           ->needs(GetAllUsersQuery::class)
           ->give(UserQuery::class);
    }
}

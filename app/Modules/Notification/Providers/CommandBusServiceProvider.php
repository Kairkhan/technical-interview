<?php

declare(strict_types=1);

namespace App\Modules\Notification\Providers;

use App\Modules\Notification\Commands\SendPushToUserCommand;
use App\Modules\Notification\Handlers\SendPushToUserHandler;
use Illuminate\Support\Facades\Bus;
use Illuminate\Support\ServiceProvider;

final class CommandBusServiceProvider extends ServiceProvider
{
    private array $maps = [
        SendPushToUserCommand::class => SendPushToUserHandler::class
    ];

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot(): void
    {
        $this->registerCommandHandlers();
    }

    private function registerCommandHandlers(): void
    {
        Bus::map($this->maps);
    }
}

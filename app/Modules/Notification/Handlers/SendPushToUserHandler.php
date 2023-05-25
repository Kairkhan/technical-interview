<?php

declare(strict_types=1);

namespace App\Modules\Notification\Handlers;

use App\Modules\Notification\Commands\SendPushToUserCommand;
use App\Modules\Notification\Contracts\Queries\UserByIdQuery;
use App\Modules\Notification\Notification\SendPushNotification;
use Illuminate\Support\Facades\Log;

final class SendPushToUserHandler
{
    public function __construct(
      private readonly UserByIdQuery $query
    ) {
    }

    public function handle(SendPushToUserCommand $command): void
    {
        $user = $this->query->getUserBydId($command->dto->userId);

        if (!$user) {
            $message = sprintf("Пользователь с id %d не найден!", $command->dto->userId);
            Log::info($message);
            return;
        }

        if (!$user->routeNotificationForFcm()) {
            return;
        }

        $data = array_merge($command->dto->data, ['userId' => $command->dto->userId]);

        $user->notify(new SendPushNotification(
            $command->dto->title,
            $command->dto->body,
            $data
        ));

    }
}

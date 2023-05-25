<?php

declare(strict_types=1);

namespace App\Modules\Notification\Commands;

use App\Modules\Notification\DTO\SendPushToUserDTO;
use Illuminate\Contracts\Queue\ShouldQueue;

final class SendPushToUserCommand implements ShouldQueue
{
    public string $queue = 'user_push_notifications';

    public function __construct(
        public readonly SendPushToUserDTO $dto
    ) {
    }
}

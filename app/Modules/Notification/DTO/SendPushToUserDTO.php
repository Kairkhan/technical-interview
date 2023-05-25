<?php

declare(strict_types=1);

namespace App\Modules\Notification\DTO;

use Illuminate\Http\Request;

final class SendPushToUserDTO
{
    public function __construct(
        public readonly int $userId,
        public readonly string $title,
        public readonly string $body,
        public readonly ?array $data = []
    ) {
    }
}

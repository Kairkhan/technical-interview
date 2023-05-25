<?php

declare(strict_types=1);

namespace App\Modules\Notification\Contracts\Queries;

use App\Modules\User\Models\User;

interface UserByIdQuery
{
    public function getUserBydId(int $userId): ?User;
}

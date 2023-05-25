<?php

declare(strict_types=1);

namespace App\Modules\User\Services;

use App\Modules\User\Contracts\Queries\GetAllUsersQuery;
use App\Modules\User\Contracts\Services\UserService as UserServiceContract;
use App\Modules\User\DTO\IndexUserDTO;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

final class UserService implements UserServiceContract
{
    public function __construct(
        private readonly GetAllUsersQuery $query
    ) {
    }

    public function getAllUsersPaginated(IndexUserDTO $filtersDTO): LengthAwarePaginator
    {
        return $this->query->getAllUsersPaginated($filtersDTO);
    }
}

<?php

declare(strict_types=1);

namespace App\Modules\User\Contracts\Queries;

use App\Modules\User\DTO\IndexUserDTO;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface GetAllUsersQuery
{
    public function getAllUsersPaginated(IndexUserDTO $filtersDTO): LengthAwarePaginator;
}

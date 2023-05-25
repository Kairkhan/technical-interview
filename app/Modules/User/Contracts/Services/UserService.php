<?php

declare(strict_types=1);

namespace App\Modules\User\Contracts\Services;

use App\Modules\User\DTO\IndexUserDTO;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface UserService
{
    public function getAllUsersPaginated(IndexUserDTO $filtersDTO): LengthAwarePaginator;
}

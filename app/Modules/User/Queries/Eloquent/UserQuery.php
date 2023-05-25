<?php

declare(strict_types=1);

namespace App\Modules\User\Queries\Eloquent;

use App\Modules\User\Contracts\Queries\GetAllUsersQuery;
use App\Modules\User\DTO\IndexUserDTO;
use App\Modules\User\Models\User;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

final class UserQuery implements GetAllUsersQuery
{
    public function getAllUsersPaginated(IndexUserDTO $filtersDTO): LengthAwarePaginator
    {
        return User::query()
            ->when($filtersDTO->name, function ($builder) use ($filtersDTO) {
                $builder->where('name', $filtersDTO->name);
            })
            ->paginate($filtersDTO->limit, ['*'], 'page', $filtersDTO->page);
    }
}

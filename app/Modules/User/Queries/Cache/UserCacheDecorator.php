<?php

declare(strict_types=1);

namespace App\Modules\User\Queries\Cache;

use App\Modules\User\Contracts\Queries\GetAllUsersQuery;
use App\Modules\User\DTO\IndexUserDTO;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Cache;

final class UserCacheDecorator implements GetAllUsersQuery
{
    private int $ttl;

    public function __construct(
        private readonly GetAllUsersQuery $query,
        private readonly Cache $cache
    )
    {
        $this->ttl = config('cache.ttl') ?? 3600;
    }

    public function getAllUsersPaginated(IndexUserDTO $filtersDTO): LengthAwarePaginator
    {
        return $this->cache->remember('users',
            $this->ttl,
            fn() => $this->query->getAllUsersPaginated($filtersDTO));
    }
}

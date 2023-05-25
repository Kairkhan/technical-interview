<?php

declare(strict_types=1);

namespace App\Modules\User\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Modules\User\Contracts\Services\UserService;
use App\Modules\User\Requests\IndexUserRequest;
use App\Modules\User\Resources\UsersResource;

final class UsersController extends Controller
{
    public function __construct(
      private  readonly UserService $service
    ) {
    }

    public function index(IndexUserRequest $request): UsersResource
    {
        $paginatedUsers = $this->service->getAllUsersPaginated($request->getDTO());

        return new UsersResource($paginatedUsers);
    }
}

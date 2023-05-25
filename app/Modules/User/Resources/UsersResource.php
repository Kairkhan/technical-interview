<?php

declare(strict_types=1);

namespace App\Modules\User\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

final class UsersResource extends ResourceCollection
{
    public function toArray($request): array
    {
        return [
            "data" => UserResource::collection($this->collection)
        ];
    }
}

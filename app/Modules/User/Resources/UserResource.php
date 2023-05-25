<?php

declare(strict_types=1);

namespace App\Modules\User\Resources;

use App\Modules\User\Models\User;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property-read User $resource
 */
final class UserResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id'    => $this->resource->getId(),
            'name'  => $this->resource->getName(),
            'email' => $this->resource->getEmail()
        ];
    }
}

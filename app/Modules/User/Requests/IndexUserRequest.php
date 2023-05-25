<?php

declare(strict_types=1);

namespace App\Modules\User\Requests;

use App\Modules\User\DTO\IndexUserDTO;
use Illuminate\Foundation\Http\FormRequest;

final class IndexUserRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'limit' => ['nullable', 'integer'],
            'page'  => ['nullable', 'integer'],
            'name'  => ['nullable']
        ];
    }

    public function getDTO(): IndexUserDTO
    {
        return IndexUserDTO::fromRequest($this);
    }
}

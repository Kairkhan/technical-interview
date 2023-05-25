<?php

declare(strict_types=1);

namespace App\Modules\User\DTO;

use Illuminate\Http\Request;

final class IndexUserDTO
{
    public int $limit;
    public int $page;
    public ?string $name;
    public static function fromRequest(Request $request): self
    {
        $self        = new self();
        $self->limit = $request->input('limit', 20);
        $self->page  = $request->input('page', 1);
        $self->name  = $request->input('name');

        return $self;
    }
}

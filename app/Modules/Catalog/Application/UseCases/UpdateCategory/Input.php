<?php

namespace App\Modules\Catalog\Application\UseCases\UpdateCategory;

class Input
{
    public function __construct(
        public int $id,
        public ?string $name = null,
        public ?array $options = null,
    ) {}
}
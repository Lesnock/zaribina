<?php

namespace App\Modules\Catalog\Application\UseCases\UpdateOption;

class Input
{
    public function __construct(
        public int $id,
        public string $name,
        public array $values,
    ) {}
}
<?php

namespace App\Modules\Catalog\Application\UseCases\CreateCategory;

class Input
{
    public function __construct(
        public string $name,
        public array $options,
    ) {}
}
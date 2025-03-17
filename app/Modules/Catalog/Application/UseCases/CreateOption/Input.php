<?php

namespace App\Modules\Catalog\Application\UseCases\CreateOption;

class Input
{
    public function __construct(
        public string $name,
        public array $values,
    ) {}
}
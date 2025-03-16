<?php

namespace App\Modules\Catalog\Domain;

use App\Modules\Catalog\Domain\ValueObjects\CategoryName;
use App\Modules\Shared\Helpers\TypeHelper;

class Category
{
    private function __construct(
        public int $id,
        public CategoryName $name,
        public array $options
    ) {
    }

    public static function create(int $id, CategoryName $name, array $options): self
    {
        TypeHelper::checkArrayInstances($options, Option::class);
        return new self($id, $name, $options);
    }
}
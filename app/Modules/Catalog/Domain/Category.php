<?php

namespace App\Modules\Catalog\Domain;

use App\Modules\Catalog\Domain\ValueObjects\CategoryName;
use App\Modules\Shared\Helpers\TypeHelper;

class Category
{
    private function __construct(
        public ?int $id,
        public CategoryName $name,
        /** @var int[] */
        public array $options
    ) {
    }

    public static function create(CategoryName $name, array $options): self
    {
        TypeHelper::checkArrayTypes($options, 'integer');
        return new self(null, $name, $options);
    }

    public static function rebuild(int $id, CategoryName $name, array $options): self
    {
        TypeHelper::checkArrayTypes($options, 'integer');
        return new self($id, $name, $options);
    }

    public function update(CategoryName $name, array $options): void
    {
        TypeHelper::checkArrayTypes($options, 'integer');
        $this->name = $name;
        $this->options = $options;
    }
}
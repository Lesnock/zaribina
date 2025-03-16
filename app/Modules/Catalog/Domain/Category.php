<?php

namespace App\Modules\Catalog\Domain;

use App\Modules\Catalog\Domain\ValueObjects\CategoryName;
use App\Modules\Shared\Helpers\TypeHelper;

class Category
{
    private function __construct(
        public ?int $id,
        public CategoryName $name,
        public array $options
    ) {
    }

    public static function create(CategoryName $name, array $options): self
    {
        TypeHelper::checkArrayInstances($options, Option::class);
        return new self(null, $name, $options);
    }

    public function update(CategoryName $name, array $options): void
    {
        TypeHelper::checkArrayInstances($options, Option::class);
        $this->updateName($name);
        $this->updateOptions($options);
    }

    public function updateName(CategoryName $name): void
    {
        if (!$name->equals($this->name)) {
            $this->name = $name;
        }
    }

    public function updateOptions(array $options): void
    {
        TypeHelper::checkArrayInstances($options, Option::class);
        $this->options = $options;
    }
}
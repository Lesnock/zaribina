<?php

namespace Tests\Builders\Catalog;

use App\Modules\Catalog\Domain\Category;
use App\Modules\Catalog\Domain\ValueObjects\CategoryName;

class CategoryBuilder
{
    private array $data = [
        'id' => 1,
        'name' => 'category',
        'options' => [1, 2, 3],
    ];

    public static function new(): CategoryBuilder
    {
        return new CategoryBuilder();
    }

    public function withName(string $name): CategoryBuilder
    {
        $this->data['name'] = $name;
        return $this;
    }

    public function build(): Category
    {
        return Category::rebuild(
            id: $this->data['id'],
            name: new CategoryName($this->data['name']),
            options: $this->data['options']
        );
    }

    public function get(): array
    {
        return $this->data;
    }
}

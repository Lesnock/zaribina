<?php

namespace App\Modules\Catalog\Infra\Repositories;

use App\Modules\Catalog\Domain\Category;
use App\Modules\Catalog\Application\Repositories\CategoryRepository;
use App\Modules\Catalog\Infra\Enums\Errors;
use App\Modules\Catalog\Infra\Exceptions\CatalogInfraException;

class CategoryRepositoryMemory implements CategoryRepository
{
    public array $categories = [];

    public function save(Category $category): int
    {
        if ($category->id) {
            return $this->update($category);
        }
        return $this->add($category);
    }

    private function update(Category $category): int
    {
        $this->categories[$category->id - 1] = $category;
        return $category->id;
    }

    private function add(Category $category): int
    {
        $category->id = count($this->categories) + 1;
        $this->categories[] = $category;
        return $category->id;
    }

    public function getById(int $id): Category
    {
        foreach ($this->categories as $category) {
            if ($category->id === $id) {
                return $category;
            }
        }
        throw new CatalogInfraException(Errors::CATEGORY_NOT_FOUND);
    }
}
<?php

namespace App\Modules\Catalog\Application\Repositories;

use App\Modules\Catalog\Domain\Category;

interface CategoryRepository
{
    public function get(int $id): Category;
    public function save(Category $category): int;
    public function delete(int $id): void;
}
<?php

namespace App\Modules\Catalog\Application\UseCases;

use App\Modules\Catalog\Application\Repositories\CategoryRepository;
use App\Modules\Catalog\Domain\Category;
use App\Modules\Catalog\Domain\ValueObjects\CategoryName;

class CreateCategory
{
    public function __construct(private CategoryRepository $repository)
    {
    }

    public function execute(array $input): int
    {
        $category = Category::create(
            name: new CategoryName($input['name']),
            options: $input['options']
        );
        return $this->repository->save($category);
    }
}

<?php

namespace App\Modules\Catalog\Application\UseCases;

use App\Modules\Catalog\Application\Repositories\CategoryRepository;
use App\Modules\Catalog\Domain\ValueObjects\CategoryName;

class UpdateCategory
{
    public function __construct(private CategoryRepository $repository)
    { }

    public function execute(int $id, array $input): int
    {
        $category = $this->repository->get($id);
        $category->update(
            name: new CategoryName($input['name']),
            options: $input['options']
        );
        return $this->repository->save($category);
    }
}
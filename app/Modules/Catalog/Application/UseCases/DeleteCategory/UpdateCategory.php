<?php

namespace App\Modules\Catalog\Application\UseCases\UpdateCategory;

use App\Modules\Catalog\Application\Repositories\CategoryRepository;

class UpdateCategory
{
    public function __construct(private CategoryRepository $repository)
    { }

    public function execute(int $id): void
    {
        $this->repository->delete($id);
    }
}
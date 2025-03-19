<?php

namespace App\Modules\Catalog\Application\UseCases;

use App\Modules\Catalog\Application\Repositories\CategoryRepository;

class DeleteCategory
{
    public function __construct(private CategoryRepository $repository)
    { }

    public function execute(int $id): void
    {
        $this->repository->delete($id);
    }
}
<?php

namespace App\Modules\Catalog\Application\UseCases;

use App\Modules\Catalog\Application\Repositories\ProductRepository;

class DeleteProduct
{
    public function __construct(private ProductRepository $repository)
    { }

    public function execute(int $id): void
    {
        $this->repository->delete($id);
    }
}
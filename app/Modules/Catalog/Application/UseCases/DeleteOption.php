<?php

namespace App\Modules\Catalog\Application\UseCases;

use App\Modules\Catalog\Application\Repositories\OptionRepository;

class DeleteOption
{
    public function __construct(private OptionRepository $repository)
    { }

    public function execute(int $id): void
    {
        $this->repository->delete($id);
    }
}
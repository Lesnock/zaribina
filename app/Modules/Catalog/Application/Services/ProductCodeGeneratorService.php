<?php

namespace App\Modules\Catalog\Application\Services;

use App\Modules\Catalog\Application\Repositories\ProductRepository;

class ProductCodeGeneratorService
{
    public function __construct(private ProductRepository $repository)
    {
        //
    }

    public function execute(): string
    {
        $lastCode = $this->repository->getLastCode();
        if (!$lastCode) {
            return $this->format(1);
        }
        return $this->format((int) $lastCode + 1);
    }

    private function format(int $code): string
    {
        return str_pad($code, 6, '0', STR_PAD_LEFT);
    }
}
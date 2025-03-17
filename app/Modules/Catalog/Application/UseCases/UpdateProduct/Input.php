<?php

namespace App\Modules\Catalog\Application\UseCases\UpdateProduct;

class Input
{
    public function __construct(
        public int $id,
        public string $name,
        public string $code,
        public float $paidPrice,
        public float $sellPrice,
        public array $photos,
        public array $optionValues,
    ) {}
}
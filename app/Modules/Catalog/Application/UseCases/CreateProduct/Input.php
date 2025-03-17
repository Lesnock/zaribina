<?php

namespace App\Modules\Catalog\Application\UseCases\CreateProduct;

class Input
{
    public function __construct(
        public string $name,
        public string $code,
        public float $paidPrice,
        public float $sellPrice,
        public array $photos,
        public array $optionValues,
    ) {}
}
<?php

namespace App\Modules\Catalog\Application\Repositories;

use App\Modules\Catalog\Domain\Product;

interface ProductRepository
{
    public function get(int $id): Product;
    public function count(): int;
    public function save(Product $product): int;
    public function delete(int $id): void;
}
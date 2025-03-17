<?php

namespace App\Modules\Catalog\Infra\Repositories;

use App\Modules\Catalog\Domain\Product;
use App\Modules\Catalog\Application\Repositories\ProductRepository;
use App\Modules\Catalog\Infra\Enums\Errors;
use App\Modules\Catalog\Infra\Exceptions\CatalogInfraException;

class ProductRepositoryMemory implements ProductRepository
{
    public function __construct(public array $products = [])
    { }

    public function save(Product $product): int
    {
        if ($product->id) {
            return $this->update($product);
        }
        return $this->add($product);
    }

    private function update(Product $product): int
    {
        $this->products[$product->id - 1] = $product;
        return $product->id;
    }

    private function add(Product $product): int
    {
        $product->id = count($this->products) + 1;
        $this->products[] = $product;
        return $product->id;
    }

    public function get(int $id): Product
    {
        foreach ($this->products as $product) {
            if ($product->id === $id) {
                return $product;
            }
        }
        throw new CatalogInfraException(Errors::CATEGORY_NOT_FOUND);
    }

    public function delete(int $id): void
    {
        foreach ($this->products as $key => $product) {
            if ($product->id === $id) {
                unset($this->products[$key]);
                return;
            }
        }
        throw new CatalogInfraException(Errors::CATEGORY_NOT_FOUND);
    }
}

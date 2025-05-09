<?php

namespace Tests\Builders\Catalog;

use App\Modules\Catalog\Domain\Product;
use App\Modules\Catalog\Domain\ValueObjects\ProductCode;
use App\Modules\Catalog\Domain\ValueObjects\ProductName;
use App\Modules\Catalog\Domain\ValueObjects\ProductPaidPrice;
use App\Modules\Catalog\Domain\ValueObjects\ProductSellPrice;

class ProductBuilder
{
    private array $data = [
        'id' => 1,
        'categoryId' => 1,
        'name' => 'product',
        'code' => 'product-code',
        'paidPrice' => 100,
        'sellPrice' => 200,
        'photos' => [],
        'optionValues' => [1, 2],
    ];

    public static function new(): self
    {
        return new self();
    }

    public function withName(string $name): self
    {
        $this->data['name'] = $name;
        return $this;
    }

    public function withCode(string $code): self
    {
        $this->data['code'] = $code;
        return $this;
    }

    public function withSellPrice(float $sellPrice): self
    {
        $this->data['sellPrice'] = $sellPrice;
        return $this;
    }

    public function build(): Product
    {
        return Product::rebuild(
            id: $this->data['id'],
            categoryId: $this->data['categoryId'],
            name: new ProductName($this->data['name']),
            code: new ProductCode($this->data['code']),
            paidPrice: new ProductPaidPrice($this->data['paidPrice']),
            sellPrice: new ProductSellPrice($this->data['sellPrice']),
            photos: $this->data['photos'],
            optionValues: $this->data['optionValues']
        );
    }

    public function get(): array
    {
        return $this->data;
    }
}

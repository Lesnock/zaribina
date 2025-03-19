<?php

namespace App\Modules\Catalog\Application\UseCases;

use App\Modules\Catalog\Application\Repositories\ProductRepository;
use App\Modules\Catalog\Domain\Product;
use App\Modules\Catalog\Domain\ValueObjects\ProductCode;
use App\Modules\Catalog\Domain\ValueObjects\ProductName;
use App\Modules\Catalog\Domain\ValueObjects\ProductPaidPrice;
use App\Modules\Catalog\Domain\ValueObjects\ProductSellPrice;

class CreateProduct
{
    public function __construct(private ProductRepository $repository)
    { }

    public function execute(array $input): int
    {
        $product = Product::create(
            name: new ProductName($input['name']),
            code: new ProductCode($input['code']),
            paidPrice: new ProductPaidPrice($input['paidPrice']),
            sellPrice: new ProductSellPrice($input['sellPrice']),
            photos: $input['photos'],
            optionValues: $input['optionValues']
        );
        return $this->repository->save($product);
    }
}
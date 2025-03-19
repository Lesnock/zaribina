<?php

use App\Modules\Catalog\Application\UseCases\DeleteProduct;
use App\Modules\Catalog\Infra\Repositories\ProductRepositoryMemory;
use Tests\Builders\Catalog\ProductBuilder;

test('a product is deleted from repository', function () {
    $product = ProductBuilder::new()->build();
    $repository = new ProductRepositoryMemory([$product]);
    $sut = new DeleteProduct($repository);
    $sut->execute($product->id);
    expect(count($repository->products))->toBe(0);
});
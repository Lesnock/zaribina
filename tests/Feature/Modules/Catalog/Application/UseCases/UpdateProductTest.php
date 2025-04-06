<?php

use App\Modules\Catalog\Application\Repositories\ProductRepository;
use App\Modules\Catalog\Application\UseCases\UpdateProduct;
use App\Modules\Catalog\Infra\Repositories\ProductRepositoryMemory;
use Tests\Builders\Catalog\ProductBuilder;

test('product name is updated', function () {
    $product = ProductBuilder::new()->withName('Test product')->build();
    $repository = new ProductRepositoryMemory([$product]);
    $this->instance(ProductRepository::class, $repository);
    $sut = app(UpdateProduct::class);
    $input = [
        'id' => $product->id,
        'categoryId' => $product->categoryId,
        'name' => 'Changed',
        'paidPrice' => 100.0,
        'sellPrice' => 150.0,
        'photos' => ['/photo1.jpg', '/photo2.jpg'],
        'optionValues' => [1, 2]
    ];
    $sut->execute($product->id, $input);
    expect((string) $repository->get(1)->name)->toBe('Changed');
});
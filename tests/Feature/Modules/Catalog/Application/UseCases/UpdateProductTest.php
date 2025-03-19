<?php

use App\Modules\Catalog\Application\UseCases\UpdateProduct;
use App\Modules\Catalog\Infra\Repositories\ProductRepositoryMemory;
use Tests\Builders\Catalog\ProductBuilder;

test('product name is updated', function () {
    $product = ProductBuilder::new()->withName('Test product')->build();
    $repository = new ProductRepositoryMemory([$product]);
    $sut = new UpdateProduct($repository);
    $input = [
        'id' => $product->id,
        'name' => 'Changed',
        'code' => 'TP123',
        'paidPrice' => 100.0,
        'sellPrice' => 150.0,
        'photos' => ['/photo1.jpg', '/photo2.jpg'],
        'optionValues' => [1, 2]
    ];
    $sut->execute($product->id, $input);
    expect((string) $repository->get(1)->name)->toBe('Changed');
});
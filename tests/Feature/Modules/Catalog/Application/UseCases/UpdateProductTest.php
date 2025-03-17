<?php

use App\Modules\Catalog\Application\UseCases\UpdateProduct\UpdateProduct;
use App\Modules\Catalog\Application\UseCases\UpdateProduct\Input;
use App\Modules\Catalog\Infra\Repositories\ProductRepositoryMemory;
use Tests\Builders\Catalog\ProductBuilder;

test('product name is updated', function () {
    $category = ProductBuilder::new()->withName('Test Category')->build();
    $repository = new ProductRepositoryMemory([$category]);
    $sut = new UpdateProduct($repository);
    $input = new Input(
        id: $category->id,
        name: 'Changed',
        code: 'TP123',
        paidPrice: 100.0,
        sellPrice: 150.0,
        photos: ['/photo1.jpg', '/photo2.jpg'],
        optionValues: [1, 2]
    );
    $sut->execute($input);
    expect((string) $repository->get(1)->name)->toBe('Changed');
});
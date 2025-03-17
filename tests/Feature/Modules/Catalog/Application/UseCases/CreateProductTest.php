<?php

use App\Modules\Catalog\Application\UseCases\CreateProduct\CreateProduct;
use App\Modules\Catalog\Application\UseCases\CreateProduct\Input;
use App\Modules\Catalog\Infra\Repositories\ProductRepositoryMemory;

test('product is created and saved in repository', function () {
    $repository = new ProductRepositoryMemory();
    $sut = new CreateProduct($repository);
    $sut->execute(new Input(
        name: 'Test Product',
        code: 'TP123',
        paidPrice: 100.0,
        sellPrice: 150.0,
        photos: ['/photo1.jpg', '/photo2.jpg'],
        optionValues: [1, 2]
    ));
    expect($repository->products)->toHaveCount(1);
});
<?php

use App\Modules\Catalog\Application\Repositories\ProductRepository;
use App\Modules\Catalog\Application\UseCases\CreateProduct;
use App\Modules\Catalog\Infra\Repositories\ProductRepositoryMemory;

test('product is created and saved in repository', function () {
    $repository = new ProductRepositoryMemory();
    $this->instance(ProductRepository::class, $repository);
    $sut = app(CreateProduct::class);
    $sut->execute([
        'categoryId' => 1,
        'name' => 'Test Product',
        'paidPrice' => 100.0,
        'sellPrice' => 150.0,
        'photos' => ['/photo1.jpg', '/photo2.jpg'],
        'optionValues' => [1, 2]
    ]);
    expect($repository->products)->toHaveCount(1);
});
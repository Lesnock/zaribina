<?php

use App\Modules\Catalog\Application\Services\ProductCodeGeneratorService;
use App\Modules\Catalog\Infra\Repositories\ProductRepositoryMemory;
use Tests\Builders\Catalog\ProductBuilder;

it('should return 000001 if repository is empty', function () {
    $sut = new ProductCodeGeneratorService(new ProductRepositoryMemory());
    expect($sut->execute())->toBe('000001');
});

it('should return 000002 if last code is 000001', function () {
    $product = ProductBuilder::new()->withCode('000001')->build();
    $repository = new ProductRepositoryMemory([$product]);
    $sut = new ProductCodeGeneratorService($repository);
    expect($sut->execute())->toBe('000002');
});

it('should return 123456 if last code is 123455', function () {
    $product = ProductBuilder::new()->withCode('123455')->build();
    $repository = new ProductRepositoryMemory([$product]);
    $sut = new ProductCodeGeneratorService($repository);
    expect($sut->execute())->toBe('123456');
});
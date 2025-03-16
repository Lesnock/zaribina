<?php

use App\Modules\Catalog\Infra\Repositories\CategoryRepositoryMemory;
use App\Modules\Catalog\Application\UseCases\CreateCategory\Input;
use App\Modules\Catalog\Application\UseCases\CreateCategory\CreateCategory;

test('category is saved in repository', function () {
    $repository = new CategoryRepositoryMemory();
    $sut = new CreateCategory($repository);
    $sut->execute(new Input(name: 'Test Category', options: []));
    expect($repository->categories)->toHaveCount(1);
});
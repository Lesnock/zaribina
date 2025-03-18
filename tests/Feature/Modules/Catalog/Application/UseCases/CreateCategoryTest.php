<?php

use App\Modules\Catalog\Infra\Repositories\CategoryRepositoryMemory;
use App\Modules\Catalog\Application\UseCases\CreateCategory;

test('category is created and saved in repository', function () {
    $repository = new CategoryRepositoryMemory();
    $sut = new CreateCategory($repository);
    $sut->execute(['name' => 'test', 'options' => []]);
    expect($repository->categories)->toHaveCount(1);
});

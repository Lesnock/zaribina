<?php

use App\Modules\Catalog\Application\UseCases\DeleteCategory;
use App\Modules\Catalog\Infra\Repositories\CategoryRepositoryMemory;
use Tests\Builders\Catalog\CategoryBuilder;

test('a category is deleted from repository', function () {
    $category = CategoryBuilder::new()->build();
    $repository = new CategoryRepositoryMemory([$category]);
    $sut = new DeleteCategory($repository);
    $sut->execute($category->id);
    expect(count($repository->categories))->toBe(0);
});
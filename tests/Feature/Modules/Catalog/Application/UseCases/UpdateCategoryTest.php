<?php

use App\Modules\Catalog\Application\UseCases\UpdateCategory;
use App\Modules\Catalog\Domain\ValueObjects\CategoryName;
use App\Modules\Catalog\Infra\Repositories\CategoryRepositoryMemory;
use Tests\Builders\Catalog\CategoryBuilder;

test('category name is updated', function () {
    $category = CategoryBuilder::new()->withName('Test Category')->build();
    $repository = new CategoryRepositoryMemory([$category]);
    $sut = new UpdateCategory($repository);
    $input = ['name' => new CategoryName('Changed'), 'options' => []];
    $sut->execute($category->id, $input);
    expect((string) $repository->get(1)->name)->toBe('Changed');
});
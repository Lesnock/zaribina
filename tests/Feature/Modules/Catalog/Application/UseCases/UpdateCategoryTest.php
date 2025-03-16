<?php

use App\Modules\Catalog\Application\UseCases\UpdateCategory\UpdateCategory;
use App\Modules\Catalog\Application\UseCases\UpdateCategory\Input;
use App\Modules\Catalog\Domain\Category;
use App\Modules\Catalog\Domain\ValueObjects\CategoryName;
use App\Modules\Catalog\Infra\Repositories\CategoryRepositoryMemory;

test('category name is updated', function () {
    $repository = new CategoryRepositoryMemory();
    $category = Category::create(name: new CategoryName('Test Category'), options: []);
    $repository->save($category);
    $sut = new UpdateCategory($repository);
    $sut->execute(new Input(id: 1, name: new CategoryName('Changed'), options: []));
    expect((string) $repository->getById(1)->name)->toBe('Changed');
});
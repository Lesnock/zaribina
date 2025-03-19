<?php

use App\Modules\Catalog\Application\UseCases\CreateOption;
use App\Modules\Catalog\Infra\Repositories\OptionRepositoryMemory;

test('option is created and saved in repository', function () {
    $repository = new OptionRepositoryMemory();
    $sut = new CreateOption($repository);
    $sut->execute(['name' => 'Test Category', 'values' => []]);
    expect($repository->options)->toHaveCount(1);
});
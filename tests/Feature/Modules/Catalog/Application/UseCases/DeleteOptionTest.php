<?php

use App\Modules\Catalog\Application\UseCases\DeleteOption;
use App\Modules\Catalog\Infra\Repositories\OptionRepositoryMemory;
use Tests\Builders\Catalog\OptionBuilder;

test('an option is deleted from repository', function () {
    $option = OptionBuilder::new()->build();
    $repository = new OptionRepositoryMemory([$option]);
    $sut = new DeleteOption($repository);
    $sut->execute($option->id);
    expect(count($repository->options))->toBe(0);
});
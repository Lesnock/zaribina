<?php

use App\Modules\Catalog\Application\UseCases\UpdateOption;
use App\Modules\Catalog\Domain\ValueObjects\OptionName;
use App\Modules\Catalog\Infra\Repositories\OptionRepositoryMemory;
use Tests\Builders\Catalog\OptionBuilder;

test('option name is updated', function () {
    $option = OptionBuilder::new()->withName('Test Option')->build();
    $repository = new OptionRepositoryMemory([$option]);
    $sut = new UpdateOption($repository);
    $input = ['name' => new OptionName('Changed'), 'values' => []];
    $sut->execute($option->id, $input);
    expect((string) $repository->get(1)->name)->toBe('Changed');
});
<?php

use App\Models\User;
use App\Modules\Catalog\Application\Repositories\OptionRepository;
use App\Modules\Catalog\Infra\Repositories\OptionRepositoryMemory;
use Tests\Builders\Catalog\OptionBuilder;

test('option can be created in memory repository', function () {
    $repository = new OptionRepositoryMemory();
    $this->instance(OptionRepository::class, $repository);
    $this->actingAs(User::factory()->create())
        ->post(route('api.catalog.options.store'), OptionBuilder::new()->get())
        ->assertStatus(201);
    expect($repository->count())->toBe(1);
});

test('option can be updated in memory repository', function () {
    $option = OptionBuilder::new()->build();
    $repository = new OptionRepositoryMemory([$option]);
    $this->instance(OptionRepository::class, $repository);
    $data = OptionBuilder::new()->withName('changed')->get();
    $this->actingAs(User::factory()->create())
        ->put(route('api.catalog.options.update', ['id' => $option->id]), $data)
        ->assertStatus(200);
    expect($repository->options[0]->name->name)->toBe('changed');
});

test('option can be deleted from memory repository', function () {
    $option = OptionBuilder::new()->build();
    $repository = new OptionRepositoryMemory([$option]);
    $this->instance(OptionRepository::class, $repository);
    $this->actingAs(User::factory()->create())
        ->delete(route('api.catalog.options.delete', ['id' => $option->id]))
        ->assertStatus(200);
    expect($repository->count())->toBe(0);
});

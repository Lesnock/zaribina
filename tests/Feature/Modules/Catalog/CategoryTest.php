<?php

use App\Models\User;
use App\Modules\Catalog\Application\Repositories\CategoryRepository;
use App\Modules\Catalog\Infra\Repositories\CategoryRepositoryMemory;
use Tests\Builders\Catalog\CategoryBuilder;

test('category can be created in memory repository', function () {
    $repository = new CategoryRepositoryMemory();
    $this->instance(CategoryRepository::class, $repository);
    $this->actingAs(User::factory()->create())
        ->post(route('api.catalog.categories.store'), CategoryBuilder::new()->get())
        ->assertStatus(201);
    expect($repository->count())->toBe(1);
});

test('category can be updated in memory repository', function () {
    $category = CategoryBuilder::new()->build();
    $repository = new CategoryRepositoryMemory([$category]);
    $this->instance(CategoryRepository::class, $repository);
    $data = CategoryBuilder::new()->withName('changed')->get();
    $this->actingAs(User::factory()->create())
        ->put(route('api.catalog.categories.update', ['id' => $category->id]), $data)
        ->assertStatus(200);
    expect($repository->categories[0]->name->name)->toBe('changed');
});

test('category can be deleted from memory repository', function () {
    $category = CategoryBuilder::new()->build();
    $repository = new CategoryRepositoryMemory([$category]);
    $this->instance(CategoryRepository::class, $repository);
    $this->actingAs(User::factory()->create())
        ->delete(route('api.catalog.categories.delete', ['id' => $category->id]))
        ->assertStatus(200);
    expect($repository->count())->toBe(0);
});
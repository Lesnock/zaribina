<?php

use App\Models\User;
use App\Modules\Catalog\Application\Repositories\CategoryRepository;
use App\Modules\Catalog\Infra\Repositories\CategoryRepositoryMemory;
use Tests\Builders\Catalog\CategoryBuilder;

test('category can be created in memory repository', function () {
    $repository = new CategoryRepositoryMemory();
    $this->instance(CategoryRepository::class, $repository);
    $user = User::factory()->create();
    $this->actingAs($user)
        ->post(route('api.catalog.categories.store'), CategoryBuilder::new()->get())
        ->assertStatus(201);
    expect($repository->count())->toBe(1);
});

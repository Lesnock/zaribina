<?php

use App\Models\User;
use App\Modules\Catalog\Application\Repositories\ProductRepository;
use App\Modules\Catalog\Infra\Repositories\ProductRepositoryMemory;
use Tests\Builders\Catalog\ProductBuilder;

test('product can be created in memory repository', function () {
    $repository = new ProductRepositoryMemory();
    $this->instance(ProductRepository::class, $repository);
    $this->actingAs(User::factory()->create())
        ->post(route('api.catalog.products.store'), ProductBuilder::new()->get())
        ->assertStatus(201);
    expect($repository->count())->toBe(1);
});

test('product can be updated in memory repository', function () {
    $product = ProductBuilder::new()->build();
    $repository = new ProductRepositoryMemory([$product]);
    $this->instance(ProductRepository::class, $repository);
    $data = ProductBuilder::new()->withName('changed')->get();
    $this->actingAs(User::factory()->create())
        ->put(route('api.catalog.products.update', ['id' => $product->id]), $data)
        ->assertStatus(200);
    expect($repository->products[0]->name->name)->toBe('changed');
});

test('product can be deleted from memory repository', function () {
    $product = ProductBuilder::new()->build();
    $repository = new ProductRepositoryMemory([$product]);
    $this->instance(ProductRepository::class, $repository);
    $this->actingAs(User::factory()->create())
        ->delete(route('api.catalog.products.delete', ['id' => $product->id]))
        ->assertStatus(200);
    expect($repository->count())->toBe(0);
});


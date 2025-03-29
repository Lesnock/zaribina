<?php

use App\Modules\Catalog\Application\Dtos\ListCategoriesParamsDto;
use App\Modules\Catalog\Infra\DAO\EloquentCategoryDAO;
use App\Modules\Catalog\Infra\Database\Models\Category;
use App\Modules\Catalog\Infra\Database\Models\CategoryOption;
use App\Modules\Catalog\Infra\Database\Models\Option;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('should list categories with options', function () {
    $option = Option::factory()->create();
    $category = Category::factory()->create();
    CategoryOption::factory()->create(['category_id' => $category->id, 'option_id' => $option->id]);
    $params = new ListCategoriesParamsDto();
    $sut = new EloquentCategoryDAO();
    $result = $sut->list($params);
    expect($result)->toBeArray();
    expect($result)->toHaveCount(1);
    expect($result[0]['id'])->toBe($category->id);
    expect($result[0]['options'])->toBeArray();
    expect($result[0]['options'])->toHaveCount(1);
    expect($result[0]['options'][0]['id'])->toBe($option->id);
});

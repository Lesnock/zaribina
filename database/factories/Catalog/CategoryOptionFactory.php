<?php

namespace Database\Factories\Catalog;

use App\Modules\Catalog\Infra\Database\Models\CategoryOption;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class CategoryOptionFactory extends Factory
{
    protected $model = CategoryOption::class;

    public function definition(): array
    {
        return [
            'option_id' => 1,
            'category_id' => 1
        ];
    }
}

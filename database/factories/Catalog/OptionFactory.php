<?php

namespace Database\Factories\Catalog;

use App\Modules\Catalog\Infra\Database\Models\Option;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class OptionFactory extends Factory
{
    protected $model = Option::class;

    public function definition(): array
    {
        return [
            'name' => fake()->name(),
        ];
    }
}

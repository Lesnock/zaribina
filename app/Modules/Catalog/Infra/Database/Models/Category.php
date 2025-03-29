<?php

namespace App\Modules\Catalog\Infra\Database\Models;

use Database\Factories\Catalog\CategoryFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected static function newFactory()
    {
        return CategoryFactory::new();
    }

    public function options()
    {
        return $this->hasManyThrough(
            Option::class,
            CategoryOption::class,
            'category_id',
            'id'
        );
    }
}

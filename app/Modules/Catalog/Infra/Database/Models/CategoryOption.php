<?php

namespace App\Modules\Catalog\Infra\Database\Models;

use Database\Factories\Catalog\CategoryOptionFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryOption extends Model
{
    use HasFactory;

    protected static function newFactory()
    {
        return CategoryOptionFactory::new();
    }
}

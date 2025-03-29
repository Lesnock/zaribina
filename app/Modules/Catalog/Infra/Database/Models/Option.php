<?php

namespace App\Modules\Catalog\Infra\Database\Models;

use Database\Factories\Catalog\OptionFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    use HasFactory;

    protected static function newFactory()
    {
        return OptionFactory::new();
    }
}

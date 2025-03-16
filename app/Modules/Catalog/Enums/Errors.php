<?php

namespace App\Modules\Catalog\Enums;

enum Errors: int
{
    case CATEGORY_NOT_FOUND = 1;

    public function message(?array $placeholders = []): string
    {
        $message = match ($this) {
            self::CATEGORY_NOT_FOUND => 'Categoria não encontrada',
        };

        return vsprintf($message, $placeholders);
    }
}
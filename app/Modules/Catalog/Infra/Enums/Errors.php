<?php

namespace App\Modules\Catalog\Infra\Enums;

enum Errors: int
{
    case CATEGORY_NOT_FOUND = 1;
    case OPTION_NOT_FOUND = 1;

    public function message(?array $placeholders = []): string
    {
        $message = match ($this) {
            self::CATEGORY_NOT_FOUND => 'Categoria não encontrada',
            self::OPTION_NOT_FOUND => 'Opcional não encontrado',
        };

        return vsprintf($message, $placeholders);
    }
}
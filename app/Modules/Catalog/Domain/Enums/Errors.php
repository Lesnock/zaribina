<?php

namespace App\Modules\Catalog\Domain\Enums;

enum Errors: int
{
    case CATEGORY_NAME_IS_REQUIRED = 1;
    case OPTION_NAME_IS_REQUIRED = 2;
    case OPTION_VALUE_NAME_IS_REQUIRED = 3;
    case INVALID_OPTION = 4;

    public function message(?array $placeholders = []): string
    {
        $message = match ($this) {
            self::CATEGORY_NAME_IS_REQUIRED => 'O nome da categoria é obrigatório',
            self::OPTION_NAME_IS_REQUIRED => 'O nome do opcional é obrigatório',
            self::OPTION_VALUE_NAME_IS_REQUIRED => 'O nome do valor do opcional é obrigatório',
            self::INVALID_OPTION => 'Opção inválida',
        };

        return vsprintf($message, $placeholders);
    }
}
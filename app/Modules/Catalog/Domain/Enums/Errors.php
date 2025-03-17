<?php

namespace App\Modules\Catalog\Domain\Enums;

enum Errors: int
{
    case CATEGORY_NAME_IS_REQUIRED = 1;
    case OPTION_NAME_IS_REQUIRED = 2;
    case OPTION_VALUE_NAME_IS_REQUIRED = 3;
    case INVALID_OPTION = 4;
    case PRODUCT_NAME_IS_REQUIRED = 5;
    case PRODUCT_CODE_IS_REQUIRED = 6;
    case PRODUCT_PAID_PRICE_IS_REQUIRED = 7;
    case PRODUCT_PAID_PRICE_SHOULD_BE_GREATHER_THAN_ZERO = 8;
    case PRODUCT_SELL_PRICE_IS_REQUIRED = 9;
    case PRODUCT_SELL_PRICE_SHOULD_BE_GREATHER_THAN_ZERO = 10;
    case PRODUCT_PHOTO_PATH_IS_INVALID = 11;

    public function message(?array $placeholders = []): string
    {
        $message = match ($this) {
            self::CATEGORY_NAME_IS_REQUIRED => 'O nome da categoria é obrigatório',
            self::OPTION_NAME_IS_REQUIRED => 'O nome do opcional é obrigatório',
            self::OPTION_VALUE_NAME_IS_REQUIRED => 'O nome do valor do opcional é obrigatório',
            self::INVALID_OPTION => 'Opção inválida',
            self::PRODUCT_NAME_IS_REQUIRED => 'O nome do produto é obrigatório',
            self::PRODUCT_CODE_IS_REQUIRED => 'O codigo do produto é obrigatório',
            self::PRODUCT_PAID_PRICE_IS_REQUIRED => 'O preco pago do produto é obrigatório',
            self::PRODUCT_PAID_PRICE_SHOULD_BE_GREATHER_THAN_ZERO => 'O preco pago do produto deve ser maior que zero',
            self::PRODUCT_SELL_PRICE_IS_REQUIRED => 'O preco de venda do produto é obrigatório',
            self::PRODUCT_SELL_PRICE_SHOULD_BE_GREATHER_THAN_ZERO => 'O preco de venda do produto deve ser maior que zero',
            self::PRODUCT_PHOTO_PATH_IS_INVALID => 'O caminho da foto do produto é inválido',
        };

        return vsprintf($message, $placeholders);
    }
}

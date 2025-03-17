<?php

namespace App\Modules\Catalog\Domain\ValueObjects;

use App\Modules\Catalog\Domain\Enums\Errors;
use App\Modules\Catalog\Domain\Exceptions\CatalogDomainException;

class ProductSellPrice
{
    public function __construct(public float $value) {
        if (empty($this->value)) {
            throw new CatalogDomainException(Errors::PRODUCT_SELL_PRICE_IS_REQUIRED);
        }
        if ($this->value < 0) {
            throw new CatalogDomainException(Errors::PRODUCT_SELL_PRICE_SHOULD_BE_GREATHER_THAN_ZERO);
        }
    }

    public function equals(ProductSellPrice $value): bool
    {
        return $this->value === $value->value;
    }
}
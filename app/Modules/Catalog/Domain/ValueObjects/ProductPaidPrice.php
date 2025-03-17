<?php

namespace App\Modules\Catalog\Domain\ValueObjects;

use App\Modules\Catalog\Domain\Enums\Errors;
use App\Modules\Catalog\Domain\Exceptions\CatalogDomainException;

class ProductPaidPrice
{
    public function __construct(public float $value) {
        if (empty($this->value)) {
            throw new CatalogDomainException(Errors::PRODUCT_PAID_PRICE_IS_REQUIRED);
        }
        if ($this->value < 0) {
            throw new CatalogDomainException(Errors::PRODUCT_PAID_PRICE_SHOULD_BE_GREATHER_THAN_ZERO);
        }
    }

    public function equals(ProductPaidPrice $value): bool
    {
        return $this->value === $value->value;
    }
}
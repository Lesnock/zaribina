<?php

namespace App\Modules\Catalog\Domain\ValueObjects;

use App\Modules\Catalog\Domain\Enums\Errors;
use App\Modules\Catalog\Domain\Exceptions\CatalogDomainException;

class ProductCode
{
    public function __construct(public string $code) {
        if (empty($this->code)) {
            throw new CatalogDomainException(Errors::PRODUCT_CODE_IS_REQUIRED);
        }
    }

    public function equals(ProductCode $code): bool
    {
        return $this->code === $code->code;
    }

    public function __toString(): string
    {
        return $this->code;
    }
}
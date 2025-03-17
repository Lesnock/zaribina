<?php

namespace App\Modules\Catalog\Domain\ValueObjects;

use App\Modules\Catalog\Domain\Enums\Errors;
use App\Modules\Catalog\Domain\Exceptions\CatalogDomainException;

class ProductName
{
    public function __construct(public string $name) {
        if (empty($this->name)) {
            throw new CatalogDomainException(Errors::PRODUCT_NAME_IS_REQUIRED);
        }
    }

    public function equals(ProductName $name): bool
    {
        return $this->name === $name->name;
    }

    public function __toString(): string
    {
        return $this->name;
    }
}
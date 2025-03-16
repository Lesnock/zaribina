<?php

namespace App\Modules\Catalog\Domain\ValueObjects;

use App\Modules\Catalog\Domain\Enums\Errors;
use App\Modules\Catalog\Domain\Exceptions\CatalogDomainException;

class CategoryName
{
    public function __construct(public string $name) {
        if (empty($this->name)) {
            throw new CatalogDomainException(Errors::CATEGORY_NAME_IS_REQUIRED);
        }
    }

    public function __toString(): string
    {
        return $this->name;
    }
}
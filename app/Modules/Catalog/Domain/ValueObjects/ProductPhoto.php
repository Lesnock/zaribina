<?php

namespace App\Modules\Catalog\Domain\ValueObjects;

use App\Modules\Catalog\Domain\Enums\Errors;
use App\Modules\Catalog\Domain\Exceptions\CatalogDomainException;

class ProductPhoto
{
    public function __construct(public string $path) {
        if (empty($this->path)) {
            throw new CatalogDomainException(Errors::PRODUCT_PHOTO_PATH_IS_INVALID);
        }
    }

    public function equals(ProductPhoto $path): bool
    {
        return $this->path === $path->path;
    }

    public function __toString(): string
    {
        return $this->path;
    }
}
<?php

namespace App\Modules\Catalog\Domain\Exceptions;

use App\Modules\Catalog\Domain\Enums\Errors;
use DomainException;

class CatalogDomainException extends DomainException
{
    public function __construct(Errors $error, array $placeholders = [])
    {
        parent::__construct($error->message($placeholders), $error->value);
    }
}
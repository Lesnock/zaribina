<?php

namespace App\Modules\Catalog\Domain\Exceptions;

use App\Modules\Catalog\Domain\Enums\Errors;
use Exception;

class CatalogDomainException extends Exception
{
    public function __construct(Errors $error, array $placeholders = [])
    {
        parent::__construct($error->message($placeholders), $error->value);
    }
}
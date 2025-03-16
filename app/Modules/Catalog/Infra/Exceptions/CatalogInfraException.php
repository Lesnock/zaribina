<?php

namespace App\Modules\Catalog\Infra\Exceptions;

use App\Modules\Catalog\Infra\Enums\Errors;
use Exception;

class CatalogInfraException extends Exception
{
    public function __construct(Errors $error, array $placeholders = [])
    {
        parent::__construct($error->message($placeholders), $error->value);
    }
}
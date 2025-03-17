<?php

namespace App\Modules\Catalog\Infra\Exceptions;

use App\Modules\Catalog\Infra\Enums\Errors;
use App\Modules\Shared\Exceptions\InfraException;

class CatalogInfraException extends InfraException
{
    public function __construct(Errors $error, array $placeholders = [])
    {
        parent::__construct($error->message($placeholders), $error->value);
    }
}
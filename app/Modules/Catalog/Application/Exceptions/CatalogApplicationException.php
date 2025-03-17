<?php

namespace App\Modules\Catalog\Application\Exceptions;

use App\Modules\Catalog\Application\Enums\Errors;
use App\Modules\Shared\Exceptions\ApplicationException;

class CatalogApplicationException extends ApplicationException
{
    public function __construct(Errors $error, array $placeholders = [])
    {
        parent::__construct($error->message($placeholders), $error->value);
    }
}
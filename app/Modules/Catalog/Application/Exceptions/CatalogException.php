<?php

namespace App\Modules\Catalog\Application\Exceptions;

use App\Modules\Catalog\Application\Enums\Errors;
use Exception;

class CatalogException extends Exception
{
    public function __construct(Errors $error, array $placeholders = [])
    {
        parent::__construct($error->message($placeholders), $error->value);
    }
}
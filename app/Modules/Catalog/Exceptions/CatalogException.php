<?php

namespace App\Modules\Catalog\Exceptions;

use App\Modules\Catalog\Enums\Errors;
use Exception;

class CatalogException extends Exception
{
    public function __construct(Errors $error, array $placeholders = [])
    {
        parent::__construct($error->message($placeholders), $error->value);
    }
}
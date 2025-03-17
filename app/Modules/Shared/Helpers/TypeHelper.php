<?php

namespace App\Modules\Shared\Helpers;

use InvalidArgumentException;

class TypeHelper
{
    public static function checkArrayInstances(array $array, string $type): void
    {
        foreach ($array as $item) {
            if (!$item instanceof $type) {
                throw new InvalidArgumentException("All array items must be instances of $type");
            }
        }
    }

    public static function checkArrayTypes(array $array, string $type): void
    {
        foreach ($array as $item) {
            if (gettype($item) !== $type) {
                throw new InvalidArgumentException("All array items must be of type $type");
            }
        }
    }
}
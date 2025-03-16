<?php

namespace App\Modules\Catalog\Domain;

use App\Modules\Catalog\Domain\ValueObjects\OptionValueName;

class OptionValue
{
    private function __construct(
        public ?int $id,
        public OptionValueName $name,
    ) {
    }

    public static function create(int $id, OptionValueName $name): self
    {
        return new self($id, $name);
    }
}
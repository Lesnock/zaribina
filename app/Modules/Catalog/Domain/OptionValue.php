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

    public static function create(OptionValueName $name): self
    {
        return new self(null, $name);
    }

    public static function rebuild(int $id, OptionValueName $name): self
    {
        return new self($id, $name);
    }
}
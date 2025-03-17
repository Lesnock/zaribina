<?php

namespace App\Modules\Catalog\Domain;

use App\Modules\Catalog\Domain\ValueObjects\OptionName;
use App\Modules\Shared\Helpers\TypeHelper;

class Option
{
    private function __construct(
        public ?int $id,
        public OptionName $name,
        public array $values,
    ) {
    }

    public static function create(OptionName $name, array $values): self
    {
        TypeHelper::checkArrayInstances($values, OptionValue::class);
        return new self(null, $name, $values);
    }

    public static function rebuild(int $id, OptionName $name, array $values): self
    {
        TypeHelper::checkArrayInstances($values, OptionValue::class);
        return new self($id, $name, $values);
    }

    public function update(OptionName $name, array $values): void
    {
        TypeHelper::checkArrayInstances($values, OptionValue::class);
        $this->name = $name;
        $this->values = $values;
    }
}
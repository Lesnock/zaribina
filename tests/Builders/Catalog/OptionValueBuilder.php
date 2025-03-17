<?php

namespace Tests\Builders\Catalog;

use App\Modules\Catalog\Domain\OptionValue;
use App\Modules\Catalog\Domain\ValueObjects\OptionValueName;

class OptionValueBuilder
{
    private array $data = [
        'id' => 1,
        'name' => 'value',
    ];

    public static function new(): self
    {
        return new self();
    }

    public function withName(string $name): self
    {
        $this->data['name'] = $name;
        return $this;
    }

    public function build(): OptionValue
    {
        return OptionValue::rebuild(
            id: $this->data['id'],
            name: new OptionValueName($this->data['name']),
        );
    }
}

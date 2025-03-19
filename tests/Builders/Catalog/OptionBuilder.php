<?php

namespace Tests\Builders\Catalog;

use App\Modules\Catalog\Domain\Option;
use App\Modules\Catalog\Domain\ValueObjects\OptionName;

class OptionBuilder
{
    private array $data = [
        'id' => 1,
        'name' => 'option',
        'values' => [],
    ];

    public static function new(): self
    {
        $builder = new self();
        $builder->data['values'][] = OptionValueBuilder::new()->build();
        return $builder;
    }

    public function withName(string $name): self
    {
        $this->data['name'] = $name;
        return $this;
    }

    public function build(): Option
    {
        return Option::rebuild(
            id: $this->data['id'],
            name: new OptionName($this->data['name']),
            values: $this->data['values']
        );
    }

    public function get(): array
    {
        return $this->data;
    }
}

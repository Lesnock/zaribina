<?php

namespace App\Modules\Catalog\Infra\Repositories;

use App\Modules\Catalog\Domain\Option;
use App\Modules\Catalog\Application\Repositories\OptionRepository;
use App\Modules\Catalog\Infra\Enums\Errors;
use App\Modules\Catalog\Infra\Exceptions\CatalogInfraException;

class OptionRepositoryMemory implements OptionRepository
{
    public function __construct(public array $options = [])
    { }

    public function count(): int
    {
        return count($this->options);
    }

    public function save(Option $option): int
    {
        if ($option->id) {
            return $this->update($option);
        }
        return $this->add($option);
    }

    private function update(Option $option): int
    {
        $this->options[$option->id - 1] = $option;
        return $option->id;
    }

    private function add(Option $option): int
    {
        $option->id = count($this->options) + 1;
        $this->options[] = $option;
        return $option->id;
    }

    public function get(int $id): Option
    {
        foreach ($this->options as $option) {
            if ($option->id === $id) {
                return $option;
            }
        }
        throw new CatalogInfraException(Errors::OPTION_NOT_FOUND);
    }

    public function delete(int $id): void
    {
        foreach ($this->options as $key => $option) {
            if ($option->id === $id) {
                unset($this->options[$key]);
                return;
            }
        }
        throw new CatalogInfraException(Errors::OPTION_NOT_FOUND);
    }
}

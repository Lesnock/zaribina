<?php

namespace App\Modules\Catalog\Application\Repositories;

use App\Modules\Catalog\Domain\Option;

interface OptionRepository
{
    public function get(int $id): Option;
    public function count(): int;
    public function save(Option $option): int;
    public function delete(int $id): void;
}
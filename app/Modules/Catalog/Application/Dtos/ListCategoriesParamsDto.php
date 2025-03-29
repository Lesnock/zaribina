<?php

namespace App\Modules\Catalog\Application\Dtos;

class ListCategoriesParamsDto
{
    public function __construct(
        public int $page = 1,
        public int $perPage = 15,
        public ?string $name = null
    ) {
    }
}


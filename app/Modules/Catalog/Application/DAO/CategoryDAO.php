<?php

namespace App\Modules\Catalog\Application\DAO;

use App\Modules\Catalog\Application\Dtos\ListCategoriesParamsDto;

interface CategoryDAO
{
    public function list(ListCategoriesParamsDto $params): array;
}
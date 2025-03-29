<?php

namespace App\Modules\Catalog\Application\UseCases;

use App\Modules\Catalog\Application\DAO\CategoryDAO;
use App\Modules\Catalog\Application\Dtos\ListCategoriesParamsDto;

class ListCategories
{
    public function __construct(private CategoryDAO $dao)
    {
        //
    }

    public function execute(ListCategoriesParamsDto $input): array
    {
        return $this->dao->list($input);
    }
}

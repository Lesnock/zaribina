<?php

namespace App\Modules\Catalog\Infra\DAO;

use App\Modules\Catalog\Application\DAO\CategoryDAO;
use App\Modules\Catalog\Application\Dtos\ListCategoriesParamsDto;
use App\Modules\Catalog\Infra\Database\Models\Category as Category;

class EloquentCategoryDAO implements CategoryDAO
{
    public function list(ListCategoriesParamsDto $params): array
    {
        return Category::with('options')
            ->when($params->name, function ($query) use ($params) {
                $query->where('name', 'like', '%' . $params->name . '%');
            })
            ->paginate(perPage: $params->perPage, page: $params->page)
            ->toArray()['data'];
    }
}

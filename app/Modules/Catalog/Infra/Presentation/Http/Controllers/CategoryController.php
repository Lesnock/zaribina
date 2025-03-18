<?php

namespace App\Modules\Catalog\Infra\Presentation\Http\Controllers;

use App\Modules\Catalog\Application\UseCases\CreateCategory;
use App\Modules\Catalog\Infra\Presentation\Http\Requests\CreateCategoryRequest;
use App\Modules\Shared\Presentation\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

class CategoryController extends Controller
{
    public function store(): JsonResponse
    {
        return $this->action(function (CreateCategoryRequest $request, CreateCategory $usecase) {
            return $usecase->execute($request->validated());
        }, 201);
    }
}

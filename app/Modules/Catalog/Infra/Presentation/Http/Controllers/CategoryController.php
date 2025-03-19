<?php

namespace App\Modules\Catalog\Infra\Presentation\Http\Controllers;

use App\Modules\Catalog\Application\UseCases\CreateCategory;
use App\Modules\Catalog\Application\UseCases\UpdateCategory;
use App\Modules\Catalog\Infra\Presentation\Http\Requests\CreateCategoryRequest;
use App\Modules\Catalog\Infra\Presentation\Http\Requests\UpdateCategoryRequest;
use App\Modules\Shared\Presentation\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

class CategoryController extends Controller
{
    public function store(): JsonResponse
    {
        return $this->action(fn (CreateCategoryRequest $request, CreateCategory $usecase) => 
            $usecase->execute($request->validated()),
        201);
    }

    public function update(int $id): JsonResponse
    {
        return $this->action(fn (UpdateCategoryRequest $request, UpdateCategory $usecase) =>
            $usecase->execute($id, $request->validated()), 
        200);
    }
}

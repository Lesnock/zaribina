<?php

namespace App\Modules\Catalog\Infra\Presentation\Http\Controllers;

use App\Modules\Catalog\Application\UseCases\CreateProduct;
use App\Modules\Catalog\Application\UseCases\DeleteProduct;
use App\Modules\Catalog\Application\UseCases\UpdateProduct;
use App\Modules\Catalog\Infra\Presentation\Http\Requests\CreateProductRequest;
use App\Modules\Catalog\Infra\Presentation\Http\Requests\UpdateProductRequest;
use App\Modules\Shared\Presentation\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

class ProductController extends Controller
{
    public function store(): JsonResponse
    {
        return $this->action(fn (CreateProductRequest $request, CreateProduct $usecase) => 
            $usecase->execute($request->validated()),
        201);
    }

    public function update(int $id): JsonResponse
    {
        return $this->action(fn (UpdateProductRequest $request, UpdateProduct $usecase) =>
            $usecase->execute($id, $request->validated()), 
        200);
    }

    public function delete(int $id): JsonResponse
    {
        return $this->action(fn (DeleteProduct $usecase) =>
            $usecase->execute($id),
        200);
    }
}


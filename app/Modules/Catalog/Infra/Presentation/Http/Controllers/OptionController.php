<?php

namespace App\Modules\Catalog\Infra\Presentation\Http\Controllers;

use App\Modules\Catalog\Application\UseCases\CreateOption;
use App\Modules\Catalog\Application\UseCases\DeleteOption;
use App\Modules\Catalog\Application\UseCases\UpdateOption;
use App\Modules\Catalog\Infra\Presentation\Http\Requests\CreateOptionRequest;
use App\Modules\Catalog\Infra\Presentation\Http\Requests\UpdateOptionRequest;
use App\Modules\Shared\Presentation\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

class OptionController extends Controller
{
    public function store(): JsonResponse
    {
        return $this->action(fn (CreateOptionRequest $request, CreateOption $usecase) => 
            $usecase->execute($request->validated()),
        201);
    }

    public function update(int $id): JsonResponse
    {
        return $this->action(fn (UpdateOptionRequest $request, UpdateOption $usecase) =>
            $usecase->execute($id, $request->validated()), 
        200);
    }

    public function delete(int $id): JsonResponse
    {
        return $this->action(fn (DeleteOption $usecase) =>
            $usecase->execute($id),
        200);
    }
}

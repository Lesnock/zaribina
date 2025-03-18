<?php

namespace App\Modules\Shared\Presentation\Http\Controllers;

use App\Http\Controllers\Controller as BaseController;
use App\Modules\Shared\Exceptions\ApplicationException;
use App\Modules\Shared\Exceptions\DomainException;
use App\Modules\Shared\Exceptions\InfraException;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;
use Throwable;

class Controller extends BaseController
{
    protected function action(callable $callback, int $code = 200): JsonResponse
    {
        try {
            $data = app()->call($callback);
            return $this->success($data, $code);
        } catch (DomainException $err) {
            return $this->error($err->getMessage(), 422);
        } catch (ApplicationException $err) {
            return $this->error($err->getMessage(), 400);
        } catch (InfraException $err) {
            return $this->error($err->getMessage(), 500);
        } catch (Throwable $err) {
            Log::error($err->getMessage(), ['trace' => $err->getTraceAsString()]);
            return $this->error("Ocorreu um erro ao executar esta ação", 500);
        }
    }

    protected function success(mixed $content, int $code = 200): JsonResponse
    {
        return response()->json($content, $code);
    }

    protected function error(string|array $content, int $code = 400): JsonResponse
    {
        return response()->json($content, $code);
    }
}

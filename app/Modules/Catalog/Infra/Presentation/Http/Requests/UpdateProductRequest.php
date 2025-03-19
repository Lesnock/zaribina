<?php

namespace App\Modules\Catalog\Infra\Presentation\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name' => 'required|string',
            'paidPrice' => 'required|numeric',
            'sellPrice' => 'required|numeric',
            'photos' => 'array',
            'photos.*' => 'required|string',
            'optionValues' => 'required|array',
        ];
    }
}

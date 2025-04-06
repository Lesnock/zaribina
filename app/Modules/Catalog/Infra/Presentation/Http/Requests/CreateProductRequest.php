<?php

namespace App\Modules\Catalog\Infra\Presentation\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateProductRequest extends FormRequest
{
    public function rules()
    {
        return [
            'categoryId' => 'required|integer',
            'name' => 'required|string',
            'paidPrice' => 'required|numeric',
            'sellPrice' => 'required|numeric',
            'photos' => 'array',
            'photos.*' => 'required|string',
            'optionValues' => 'required|array',
        ];
    }
}

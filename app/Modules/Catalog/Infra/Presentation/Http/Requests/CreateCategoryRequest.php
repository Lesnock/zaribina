<?php

namespace App\Modules\Catalog\Infra\Presentation\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateCategoryRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name' => 'required|string',
            'options' => 'required|array',
        ];
    }
}

<?php

namespace App\Modules\Catalog\Infra\Presentation\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateOptionRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name' => 'required|string',
            'values' => 'required|array',
        ];
    }
}

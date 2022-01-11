<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'rating' => ['bail', 'digits_between:1,5']
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SearchRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'query' => ['nullable', 'string'],
            'price_range_min' => ['nullable', 'numeric', 'min:0'],
            'price_range_max' => ['nullable', 'numeric', 'min:0'],
            'categories' => ['nullable'],
            'rating' => ['nullable', 'digits_between:1,5']
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}

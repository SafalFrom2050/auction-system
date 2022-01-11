<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BidRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'price' => ['bail', 'numeric']
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}

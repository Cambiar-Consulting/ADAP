<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AlternateContactRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required',
        ];
    }

    public function attributes(): array
    {
        return [

        ];
    }
}

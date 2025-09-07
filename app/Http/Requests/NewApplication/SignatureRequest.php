<?php

namespace App\Http\Requests\NewApplication;

use Illuminate\Foundation\Http\FormRequest;

class SignatureRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'signed' => 'required',
        ];
    }

    public function attributes(): array
    {
        return [
            'signed' => 'signature',
        ];
    }
}

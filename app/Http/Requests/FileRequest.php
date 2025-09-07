<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FileRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'application_id' => 'required',
            'application_type_id' => 'required',
            'file_type_id' => 'required',
            'file' => 'required',
        ];
    }

    public function attributes(): array
    {
        return [
        ];
    }
}

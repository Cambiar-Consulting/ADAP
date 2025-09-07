<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HouseholdRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required',
            'payment_frequency_id' => 'required',
        ];
    }

    public function attributes(): array
    {
        return [
            'payment_frequency_id' => 'how often',
        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddressRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'street' => 'required',
            'city' => 'required',
            'state' => 'required',
            'zipcode' => 'required',
            'address_type_id' => 'required',
            'can_contact' => 'required',
        ];
    }

    public function attributes(): array
    {
        return [
            'address_type_id' => 'address type',
        ];
    }
}

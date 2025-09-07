<?php

namespace App\Http\Requests\NewApplication;

use Illuminate\Foundation\Http\FormRequest;

class DemographicRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'first_name' => 'required',
            'last_name' => 'required',
            'date_of_birth' => 'required',
            'ssn' => 'required',
            'language_services' => 'required',
            'living_arrangement_id' => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            // 'ssn.required' => 'Social Security Number is required'
        ];
    }

    public function attributes(): array
    {
        return [
            'ssn' => 'social security number',
            'living_arrangement_id' => 'living arrangement',
        ];
    }
}

<?php

namespace App\Http\Requests;

use App\Enums\FieldTypes;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

class FormFieldRequest extends FormRequest
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
            'inputs' => ['required', 'array'],
            'inputs.*.label' => ['required', 'string', 'max:255'],
            'inputs.*.field_type' => ['required', 'string', new Enum(FieldTypes::class)],
            'inputs.*.options' => ['nullable', 'json'],
            'inputs.*.is_required' => ['nullable', 'boolean'],
        ];
    }
}

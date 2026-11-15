<?php

namespace App\Http\Requests\Crime;

use App\Models\Crime;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreCrimeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return $this->user()->can('create', Crime::class);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'crime_category_id' => [
                'required',
                'exists:crime_category,id',
            ],
            'occured_at' => [
                'required',
                'date'
            ],
            'description' => [
                'nullable',
                'string'
            ],
            'severity' => [
                'required',
                'in:low,moderate,high'
            ]
        ];
    }
}

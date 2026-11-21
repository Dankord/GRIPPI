<?php

namespace App\Http\Requests\Crime;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use App\Models\Crime;

class UpdateCrimeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        $crime = $this->route('crime');

        return $crime instanceof Crime
            && ($this->user()->can('update', $crime) ?? false);
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
                'sometimes',
                'required',
                'exists:crime_categories,id'
            ],
            'occurred_at' => [
                'sometimes',
                'required',
                'date'
            ],
            'description' => [
                'sometimes',
                'nullable',
                'string'
            ],
            'severity' => [
                'sometimes',
                'required',
                'in:low,moderate,high'
            ]
        ];
    }
}

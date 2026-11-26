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
                'exists:crime_categories,id', //gng its crime_categories not crime_category imma change it okay?
            ],
            'occurred_at' => [
                'required',
                'date'
            ],
            'description' => [
                'nullable',
                'string'
            ],
             'address' => [
                'nullable',
                'string'
            ],
            'severity' => [
                'required',
                'in:attempted,frustrated,consummated'
            ],
            'latitude' => [
                'required',
                'numeric',
                'between:-90,90'
            ],
            'longitude' => [
                'required',
                'numeric',
                'between:-180,180'
            ],
            'station_id' => [
                'required',
                'exists:stations,id'
            ]
        ];
    }
}

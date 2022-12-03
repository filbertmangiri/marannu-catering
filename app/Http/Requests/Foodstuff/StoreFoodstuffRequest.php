<?php

namespace App\Http\Requests\Foodstuff;

use App\Models\Foodstuff\Foodstuff;
use Illuminate\Support\Str;
use App\Enums\MeasurementUnit;
use Illuminate\Validation\Rules\Enum;
use Illuminate\Foundation\Http\FormRequest;

class StoreFoodstuffRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => ['required', 'string'],
            'slug' => ['required', 'string', 'unique:' . Foodstuff::class],
            'price' => ['required', 'numeric', 'min:0'],
            'measurement_unit' => ['required', 'string', new Enum(MeasurementUnit::class)],
        ];
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'name' => 'nama bahan makanan',
            'slug' => 'nama bahan makanan',
            'price' => 'harga',
            'measurement_unit' => 'satuan hitung',
        ];
    }

    /**
     * Prepare the data for validation.
     *
     * @return void
     */
    protected function prepareForValidation()
    {
        $this->merge([
            'slug' => Str::slug($this->name),
        ]);
    }
}

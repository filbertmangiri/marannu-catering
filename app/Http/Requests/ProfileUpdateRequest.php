<?php

namespace App\Http\Requests;

use App\Models\User;
use App\Enums\Gender;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Enum;
use Illuminate\Foundation\Http\FormRequest;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => ['required', 'string', 'person_name', 'max:255'],
            'email' => ['required', 'string', 'email:rfc,dns', 'max:255', Rule::unique(User::class)->ignore($this->user()->id)],
            'username' => ['required', 'string', 'username', 'min:8', 'max:20', Rule::unique(User::class)->ignore($this->user()->id)],
            'gender' => ['required', 'string', new Enum(Gender::class)],
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
            'email' => 'alamat email',
        ];
    }
}

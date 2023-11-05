<?php

namespace App\Http\Requests;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['nullable', 'string', 'max:255'],
            'email' => ['nullable', 'email', 'max:255', Rule::unique(User::class)->ignore($this->user()->id)],
            'student_number' => ['nullable', 'string', 'max:50', Rule::unique(Profile::class)->ignore($this->user()->id, 'user_id')],
            'batch' => ['nullable', 'integer'],
            'major' => ['nullable', 'string', 'max:100'],
            'gender' => ['nullable', 'string', 'in:male,female'],
            'birth_location' => ['required', 'string', 'max:100'],
            'birth_date' => ['nullable', 'date'],
            'ethnicity' => ['nullable', 'string', 'max:100'],
        ];
    }
}

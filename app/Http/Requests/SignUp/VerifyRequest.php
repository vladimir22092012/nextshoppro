<?php

namespace App\Http\Requests\SignUp;

use Illuminate\Auth\Events\Lockout;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class VerifyRequest extends FormRequest
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
     * @return array<string, Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'code' => 'required|integer|max:6|min:6',
        ];
    }

    /**
     * Get the messages of validation rules
     *
     * @return string[]
     */
    public function messages()
    {
        return [
            'required' => 'Заполните поле',
            'max' => 'Длина поля не должна превышать 6 символов',
            'min' => 'Длина поля не должна быть меньше 6 символов',
            'integer' => 'Поле должно быть числом',
        ];
    }

}

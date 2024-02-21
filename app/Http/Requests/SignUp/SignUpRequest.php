<?php

namespace App\Http\Requests\SignUp;

use Illuminate\Auth\Events\Lockout;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class SignUpRequest extends FormRequest
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
            'name' => ['required', 'string'],
            'email' => [
                'required',
                \Illuminate\Validation\Rule::unique('users', 'email'),
                'email',
            ],
            'phone' => [
                'nullable',
                'regex:/^((8|\+7)[\- ]?)?(\(?\d{3}\)?[\- ]?)?[\d\- ]{7,10}$/',
            ],
            'company' => ['nullable', 'string'],
            'password' => 'required|confirmed|max:24|min:8',
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
            'max' => 'Длина поля не должна превышать 156 символов',
            'string' => 'Поле должно быть строкой',
            'email' => 'Неверный формат',
            'unique' => 'Пользователь с таким Email адресом уже зарегистрирован',
            'phone.regex' => 'Неверный формат',
            'password.min' => 'Пароль должен содержать как минимум 8 символов.',
            'password.confirmed' => 'Не верное подтверждение пароля.'
        ];
    }

}

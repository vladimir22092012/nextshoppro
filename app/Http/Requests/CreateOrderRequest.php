<?php

namespace App\Http\Requests;

use Illuminate\Auth\Events\Lockout;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class CreateOrderRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'firstname' => ['required', 'string'],
            'name' => ['required', 'string'],
            'lastname' => ['nullable', 'string'],
            'address' => ['required', 'string'],
            'phone' => ['required', 'string'],
            'email' => 'required|email',
            'company' => ['nullable'],
            'comment' => ['nullable'],
            'delivery_type' => ['required'],
            'payment_type' => ['required'],
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
            'firstname.required' => 'Заполните поле "Фамилия"',
            'firstname.string' => 'Поле "Фамилия" должно быть строкой',
            'name.required' => 'Заполните поле "Имя"',
            'name.string' => 'Поле "Имя" должно быть строкой',
            'lastname.string' => 'Поле "Отчество" должно быть строкой',
            'address.required' => 'Заполните поле "Адрес"',
            'address.string' => 'Поле "Адрес" должно быть строкой',
            'email.required' => 'Заполните поле "Email"',
            'email.string' => 'Проверьте правильность заполнения Email адреса',
            'email.email' => 'Проверьте правильность заполнения Email адреса',
            'phone.required' => 'Заполните поле "Телефон"',
            'phone.string' => 'Поле "Телефон" должно быть строкой',
        ];
    }

}

<?php

declare(strict_types=1);

namespace App\Http\Requests\Admin\Users;

use Illuminate\Foundation\Http\FormRequest;

class EditRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() : bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules() : array
    {
        return [
            'is_admin' => ['required', 'boolean'],
            'name' => ['required', 'string', 'min:2', 'max:20'],
            'email' => ['required', 'email'],
            'password' => ['required', 'string', 'min:8', 'max:20'],
        ];
    }

    public function attributes() : array
    {
        return [
            'is_admin' => 'Тип пользователя',
            'name' => 'Имя',
            'email' => 'Почта',
            'password' => 'Пароль',
        ];
    }

}

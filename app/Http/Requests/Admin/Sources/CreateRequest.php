<?php

declare(strict_types=1);

namespace App\Http\Requests\Admin\Sources;

use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
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
            'url' => ['required', 'string', 'max:50'],
            'title' => ['required', 'string', 'max:50'],
            'description' => ['nullable', 'string', 'max:255'],
        ];
    }

    public function attributes() : array
    {
        return [
            'url' => 'Адрес',
            'title' => 'Название',
        ];
    }

}

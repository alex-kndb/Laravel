<?php

declare(strict_types=1);

namespace App\Http\Requests\Admin\Feedbacks;

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
            'author' => ['required', 'string', 'min:2', 'max:20'],
            'title' => ['required', 'string', 'max:50'],
            'feedback' => ['required', 'string', 'max:255'],
        ];

    }
}

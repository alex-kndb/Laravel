<?php

declare(strict_types=1);

namespace App\Http\Requests\Admin\News;

use App\Enums\NewsStatus;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

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
            'title' => ['required', 'string', 'max:50'],
            'author' => ['required', 'string', 'min:2', 'max:20'],
            'description' => ['required', 'string', 'max:255'],
            'status' => ['required', new Enum(NewsStatus::class)],
            'image' => ['nullable'],
            'category_ids' => ['required', 'array'],
            'category_ids.*' => ['exists:categories,id'],
        ];
    }

    public function getCategoryIds(): array
    {
        return (array) $this->validated('category_ids');
    }

}

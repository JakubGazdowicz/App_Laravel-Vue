<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTaskRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'lesson_id' => ['required', 'integer'],
            'name' => ['required', 'string', 'min:3'],
            'content' => ['required', 'string', 'min:5'],
            'correct_answer' => ['required', 'string', 'min:1']
        ];
    }
}

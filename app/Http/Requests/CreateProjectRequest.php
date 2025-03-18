<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreateProjectRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => ['required', 'string', Rule::unique('projects', 'title')],
            'sub_title' => ['nullable', 'string'],
            'sector_id' => ['required', Rule::exists('sectors', 'id')],
            'client_id' => ['required', Rule::exists('clients', 'id')],
            'description' => ['required', 'string'],
            'year_of_completion' => ['required'],
            'location' => ['required', 'string'],
            'image' => ['required', 'image', 'mimes:jpeg,png,jpg,gif,svg'],
        ];
    }
}

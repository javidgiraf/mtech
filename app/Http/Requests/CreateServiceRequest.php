<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreateServiceRequest extends FormRequest
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
            'title' => ['required', 'string', Rule::unique('services', 'title')],
            'image' => ['required', 'image', 'mimes:jpeg,png,jpg,gif,webp'],
            'content' => ['required'],
            'description' => ['required'],
            'applicationVideoTitle' => ['required', 'array'],
            'applicationVideoTitle.*' => ['required', 'string'],
            'applicationVideoUrl' => ['required', 'array'],
            'applicationVideoUrl.*' => ['required', 'string', 'regex:/^(https?:\/\/)?(www\.)?(youtube\.com\/watch\?v=|youtu\.be\/)[\w-]+$/'],
        ];
    }

    public function messages()
    {
        return [
            'applicationVideoTitle.required' => 'At least one application video title is required.',
            'applicationVideoTitle.array' => 'The application video title field must be an array.',
            'applicationVideoTitle.*.required' => 'Each application video title is required.',
            'applicationVideoTitle.*.string' => 'Each application video title must be a string.',

            'applicationVideoUrl.required' => 'At least one application video URL is required.',
            'applicationVideoUrl.array' => 'The application video URL field must be an array.',
            'applicationVideoUrl.*.required' => 'Each application video URL is required.',
            'applicationVideoUrl.*.string' => 'Each application video URL must be a string.',
        ];
    }
}

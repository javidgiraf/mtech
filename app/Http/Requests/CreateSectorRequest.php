<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreateSectorRequest extends FormRequest
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
            'title' => ['required', 'string', Rule::unique('sectors', 'title')],
            'image' => ['required', 'image', 'mimes:jpeg,png,jpg,gif,svg'],
            'description' => ['required'],
            'content' => ['required', 'array'],
            'content.*' => ['required', 'string'],
            'sectorImage' => ['required', 'array', 'min:1'],
            'sectorImage.*' => ['image', 'mimes:jpeg,png,jpg,gif,svg'],
            'location' => ['required', 'array'],
            'location.*' => ['required', 'string']
        ];
    }

    public function messages()
    {
        return [
            'content.required' => 'The content field is required.',
            'content.array' => 'The content must be an array.',
            'content.*.required' => 'Each content is required.',
            'content.*.string' => 'Each content must be a string.',
            'location.required' => 'The location field is required.',
            'location.array' => 'The location must be an array.',
            'location.*.required' => 'Each location is required.',
            'location.*.string' => 'Each location must be a string.',
            'sectorImage.required' => 'At least one image is required.',
            'sectorImage.array' => 'The sector images must be an array.',
            'sectorImage.min' => 'You must upload at least one image.',
            'sectorImage.*.image' => 'Each uploaded file must be an image.',
            'sectorImage.*.mimes' => 'Only JPEG, PNG, JPG, GIF, and SVG files are allowed.',
        ];
    }
}

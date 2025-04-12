<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateProductRequest extends FormRequest
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
        // dd(request()->all());
        return [
            'title' => ['required', 'string', Rule::unique('products', 'title')->ignore($this->route('product'))],
            'sub_title' => ['nullable', 'string'],
            'content' => ['required', 'string'],
            'description' => ['required', 'string'],
            'sector_ids' => ['required', 'array'],
            'sector_ids.*' => ['required', Rule::exists('sectors', 'id')],
            'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,svg'],
            'applicationTitle' => ['required', 'array'],
            'applicationTitle.*' => ['required', 'string'],
            'applicationImage' => ['nullable', 'array', 'min:1'],
            'applicationImage.*' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,svg'],
            'applicationVideoTitle' => ['required', 'array'],
            'applicationVideoTitle.*' => ['required', 'string'],
            'applicationVideoUrl' => ['required', 'array'],
            'applicationVideoUrl.*' => ['required', 'string', 'regex:/^(https?:\/\/)?(www\.)?(youtube\.com\/watch\?v=|youtu\.be\/)[\w-]+$/'],
        ];
    }

    public function messages()
    {
        return [
            'sector_ids.required' => 'Please select at least one sector.',
            'sector_ids.array' => 'The sector field must be an array.',
            'sector_ids.*.required' => 'Each selected sector is required.',
            'sector_ids.*.exists' => 'One or more selected sectors do not exist.',

            'applicationTitle.required' => 'At least one application title is required.',
            'applicationTitle.array' => 'The application title field must be an array.',
            'applicationTitle.*.required' => 'Each application title is required.',
            'applicationTitle.*.string' => 'Each application title must be a string.',

            'applicationImage.required' => 'At least one application image is required.',
            'applicationImage.array' => 'The application image field must be an array.',
            'applicationImage.min' => 'You must upload at least one application image.',
            'applicationImage.*.image' => 'Each application image must be a valid image file.',
            'applicationImage.*.mimes' => 'Each application image must be a file of type: jpeg, png, jpg, gif, svg.',

            'applicationVideoTitle.required' => 'At least one application video title is required.',
            'applicationVideoTitle.array' => 'The application video title field must be an array.',
            'applicationVideoTitle.*.required' => 'Each application video title is required.',
            'applicationVideoTitle.*.string' => 'Each application video title must be a string.',

            'applicationVideoUrl.required' => 'At least one application video URL is required.',
            'applicationVideoUrl.array' => 'The application video URL field must be an array.',
            'applicationVideoUrl.*.required' => 'Each application video URL is required.',
            'applicationVideoUrl.*.string' => 'Each application video URL must be a string.',
            'applicationVideoUrl.*.regex' => 'Each application video URL must be a valid YouTube link (e.g., https://www.youtube.com/watch?v=xyz or https://youtu.be/xyz).',
        ];
    }
}

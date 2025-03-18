<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreateProductRequest extends FormRequest
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
            'title' => ['required', 'string', Rule::unique('products', 'title')],
            'sub_title' => ['nullable', 'string'],
            'description' => ['required', 'string'],
            'quality_assurance' => ['nullable', 'string'],
            'sector_ids' => ['required', 'array'],
            'sector_ids.*' => ['required', Rule::exists('sectors', 'id')],
            'project_ids' => ['required', 'array'],
            'project_ids.*' => ['required', Rule::exists('projects', 'id')],
            'image' => ['required', 'image', 'mimes:jpeg,png,jpg,gif,svg'],
            'applicationTitle' => ['required', 'array'],
            'applicationTitle.*' => ['required', 'string'],
            'applicationImage' => ['required', 'array', 'min:1'],
            'applicationImage.*' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,svg'], 
            'applicationVideoTitle' => ['required', 'array'],
            'applicationVideoTitle.*' => ['required', 'string', Rule::exists('product_videos', '')],
            'applicationVideoUrl' => ['required', 'array'],
            'applicationVideoUrl.*' => ['required', 'string'],
            'catalogTitle' => ['nullable', 'array'],
            'catalogTitle.*' => ['nullable', 'string'],
            'pdfFile' => ['nullable', 'array'], 
            'pdfFile.*' => ['nullable', 'mimes:pdf', 'max:5120'], 
        ];
    }
}

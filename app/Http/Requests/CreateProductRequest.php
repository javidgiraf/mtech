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
            'image' => ['required', 'image', 'mimes:jpeg,png,jpg,gif,svg'],
            'description' => ['required', 'string'],
            'productImages' => ['required', 'array', 'min:1'],
            'productImages.*' => ['image', 'mimes:jpeg,png,jpg,gif,svg'],
            'catalogTitle' => ['nullable', 'array'],
            'catalogTitle.*' => ['nullable', 'string'],
            'pdfFile' => ['nullable', 'array'], 
            'pdfFile.*' => ['nullable', 'mimes:pdf', 'max:5120'], 
        ];
    }
}

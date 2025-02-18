<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateTestimonialRequest extends FormRequest
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
            'title' => ['required', 'string', Rule::unique('testimonials', 'title')->ignore($this->route('testimonial'))],
            'author_name' => ['required', 'string'],
            'photo' => ['required', 'image', 'mimes:jpeg,png,jpg,gif,svg'],
            'designation' => ['required', 'string'],
            'company_name' => ['required', Rule::unique('testimonials', 'company_name')->ignore($this->route('testimonial'))],
            'content' => ['required', 'string']
        ];
    }
}

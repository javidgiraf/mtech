<?php

namespace App\Http\Requests;

use App\Models\Career;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateCareerRequest extends FormRequest
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
            'position' => ['required', 'string'],
            'discipline' => ['required', 'string'],
            'job_type' => ['required', Rule::in([Career::JOBTYPE_PARTTIME, Career::JOBTYPE_FULLTIME])],
            'job_code' => ['required', Rule::unique('careers', 'job_code')->ignore($this->route('career'))],
            'location' => ['required', 'string']
        ];
    }
}

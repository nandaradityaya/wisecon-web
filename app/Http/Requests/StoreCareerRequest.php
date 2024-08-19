<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCareerRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return $this->user()->hasAnyRole(['owner']);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => ['required', 'string'],
            'thumbnail' => ['required', 'image', 'mimes:png,jpg,jpeg,svg'],
            'body' => ['required', 'string'],
            'category' => ['required', 'string'],
            'location' => ['required', 'string'],
            // 'job_descriptions.*' => ['required', 'string'],
            // 'requirements.*' => ['required', 'string'],
        ];
    }
}

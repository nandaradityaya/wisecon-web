<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
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
            'name' => ['required', 'string'],
            'thumbnail_1' => ['sometimes', 'image', 'mimes:png,jpg,jpeg,svg'],
            'thumbnail_2' => ['sometimes', 'image', 'mimes:png,jpg,jpeg,svg'],
            'client' => ['required', 'string'],
            'project' => ['required', 'string'],
            'service' => ['required', 'string'],
            'body' => ['required', 'string'],
        ];
    }
}

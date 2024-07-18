<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateServiceRequest extends FormRequest
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
            'thumbnail' => ['sometimes', 'image', 'mimes:png,jpg,jpeg,svg'],
            'excerpt' => ['required', 'string'],
            'body' => ['required', 'string'],
            'key_features.*' => ['required', 'string'],
            'our_approaches.*' => ['required', 'string'],
        ];
    }
}

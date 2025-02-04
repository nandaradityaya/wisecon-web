<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateHomeRequest extends FormRequest
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
            'img_slider' => ['sometimes', 'image', 'mimes:png,jpg,jpeg,svg'],
            'badge_text' => ['required', 'string'],
            'title' => ['required', 'string'],
            'sub_title' => ['required', 'string'],
        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
        $rules = [
            'name' => 'required|max:255',
            'slug' => 'required|max:255',
            'parent_id' => 'required|integer',
        ];

        return $rules;
    }

    public function messages()
    {
        return [
            'required' => __('validation.required'),
            'max' => __('validation.max'),
            'integer' => __('validation.integer'),
        ];
    }

    public function attribute()
    {
        return [
            'name' => __('validation.attributes.name'),
            'slug' => __('validation.attributes.slug'),
            'parent_id' => __('validation.attributes.parent_id')
        ];
    }
}

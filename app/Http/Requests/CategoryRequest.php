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
        return [
            "name" => [
                "unique:categories,name,",
                "required",
            ]
        ];
    }

    public function messages()
    {
        return [
            'name.unique' => "Tên đã tồn tại vui lòng nhập tên khác",
            "name.required" => "Tên của loại tin không được để trống",
        ];
    }
}
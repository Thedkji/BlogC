<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
        $id = $this->route('id');
        // dd($id);
        return [
            "title" => [
                "unique:posts,title,$id"
            ],
        ];
    }

    public function messages(): array
    {
        return [
            "title.unique" => "Tiêu đề đã tồn tại vui lòng thử tên khác",
        ];
    }
}

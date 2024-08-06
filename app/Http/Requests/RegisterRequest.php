<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class RegisterRequest extends FormRequest
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
            "email" => [
                "unique:users,email",
                "required",
                "email"
            ],
            "password" => [
                "required",
                "min:4",
                "confirmed"
            ],
            "password_confirmation" => [
                "required",
            ],
        ];
    }

    public function messages(): array
    {
        return [
            "email.unique" => "Email đã tồn tại",
            "email.required" => "Email không được để trống",
            "email.email" => "Email không hợp lý",

            "password.required" => "Mật khẩu không được để trống",
            "password.min" => "Mật khẩu ít nhất 4 ký tự",
            "password.confirmed"  => "Mật khẩu không trùng khớp",
            
            "password_confirmation.required" => "Mật khẩu không được để trống",
        ];
    }
}

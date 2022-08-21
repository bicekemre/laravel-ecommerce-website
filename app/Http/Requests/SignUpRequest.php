<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;

class SignUpRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        $user_id = $this->request->get("user_id");
        return [
            "name" => "required|sometimes|min:3",
            "email" => "required|sometimes|email|unique:App\Models\User,email,$user_id",
            'password' => 'required|sometimes|string|min:5|confirmed'
        ];
    }

    public function messages(): array
    {
        return [
            "name.required" => "This area is neccesary.",
            "name.min" => "Name and surname field must contain at least 3 characters.",
            "email.required" => "This area is neccesary.",
            "email.email" => "The value you enter must match the email format.",
            "email.unique" => "The e-mail you entered is registered in the system.",
            "password.required" => "This area is neccesary.",
            "password.min" => "Password field must be at least 5 characters.",
            "password.confirmed" => "Passwords entered are not the same.",
        ];
    }

    protected function passedValidation()
    {
        if ($this->request->has("password")) {
            $password = $this->request->get("password");
            $this->request->set("password", Hash::make($password));
        }
    }

}

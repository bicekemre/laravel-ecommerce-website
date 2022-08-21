<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddressRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            "user_id" => "required|numeric",
            "city" => "required|min:3",
            "district" => "required|min:3",
            "zipcode" => "required|min:3",
            "address" => "required|min:3",
        ];
    }
    public function messages(): array
    {
        return [
            "user_id.required" => "This area is neccesary.",
            "user_id.min" => "This field must be numeric.",
            "city.required" => "This area is neccesary.",
            "city.min" => "This area field must contain at least 3 characters.",
            "district.required" => "This area is neccesary.",
            "district.min" => "This area field must contain at least 3 characters.",
            "zipcode.required" => "This area is neccesary.",
            "zipcode.min" => "This area field must contain at least 3 characters.",
            "address.required" => "This area is neccesary.",
            "address.min" => "This area field must contain at least 3 characters.",
        ];
    }
}

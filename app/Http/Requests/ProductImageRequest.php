<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductImageRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            "product_id" => "required|numeric",
            "image_url" => "required|image|mimes:jpg,jpeg,png|sometimes",
        ];
    }

    public function messages()
    {
        return [
            "product_id.required" => "This area is neccesary.",
            "product_id.numeric" => "This field must be numeric.",
            "image_url.required" => "This area is neccesary.",
            "image_url.mimes" => "Only .jpg, .jpeg, .png .",
        ];
    }
}

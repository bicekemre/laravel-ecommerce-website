<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class ProductRequest extends FormRequest
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
            "category_id" => "required|numeric|gt:-1",
            "name" => "required",
            "price" => "required|numeric",
            "old_price" => "sometimes",
            "lead" => "required|min:10"
        ];
    }

    public function messages()
    {
        return [
            "category_id.required" => "This area is neccesary.",
            "category_id.numeric" => "This field must be numeric.",
            "category_id.gt" => "Please choice the category.",
            "name.required" => "This area is neccesary.",
            "price.required" => "This area is neccesary.",
            "price.numeric" => "This field must be numeric.",
            "old_price.required" => "This area is neccesary.",
            "old_price.numeric" => "This field must be numeric.",
            "lead.required" => "This area is neccesary.",
            "lead.min" => "This area field must contain at least 10 characters.",
        ];
    }

    protected function passedValidation()
    {
        if (!$this->request->has("slug")) {
            $name = $this->request->get("name");
            $slug = Str::of($name)->slug();
            $this->request->set("slug", $slug);
        }
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class CategoryRequest extends FormRequest
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
        //$user_id = $this->request->get("user_id");
        return [
            "name" => "required",
            "slug" => "required|sometimes|unique:App\Models\Category,slug",
        ];
    }

    public function messages(): array
    {
        return [
            "name.required" => "This area is neccesary.",
            "slug.required" => "This area is neccesary.",
            "slug.unique" => "The attribute you entered is registered in the system.",
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

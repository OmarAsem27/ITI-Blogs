<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\ValidatePostCreator;
class StorePostRequest extends FormRequest
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
            'title' => 'required|string|min:3|unique:posts',
            'description' => 'required|string|min:10',
            // 'posted_by' => ['required', 'string', new ValidatePostCreator()],
            'image' => 'required|image|mimes:jpeg,jpg,png|max:2048'
        ];
    }

    public  function messages(): array
    {
        return [
            "title.required"=>"title is required",
            "description.required"=>"description is required",
            "image.required"=>"image required for a post",
            "image.invalid"=>"image needed for a post",
        ];
    }
}

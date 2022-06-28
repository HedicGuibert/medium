<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticleStoreRequest extends FormRequest
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
            "title" => "required|string",
            "introduction" => "required|string|min:10",
            "body"=>"required|string|min:10",
            "image"=>"required|image",
            "slug"=>"required|string:min:2"
        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateInformationsRequest extends FormRequest
{
    public function __construct()
    {
    }
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
        if ($this->user()->name === $this->get('name') &&
            $this->user()->email === $this->get('email')) {
            return [];
        }

        if ($this->user()->name === $this->get('name')) {
            return [
                'email' => ['required', 'unique:users', 'max: 100'],
            ];
        }

        if ($this->user()->email === $this->get('email')) {
            return [
                'name' => ['required', 'unique:users', 'max: 70'],
            ];
        }

        return [
            'name' => ['required', 'unique:users', 'max: 70'],
            'email' => ['required', 'unique:users', 'max: 100'],
        ];
    }
}

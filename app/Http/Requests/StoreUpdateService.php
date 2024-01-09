<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateService extends FormRequest
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
        $rules = [   
                'title' => 'required|min:3|max:255|unique:services',
                'description' => [
                    'required',
                    'min:3',
                    'max:10000',
                ],
            ];

            if ($this->method()==='put') {
                $rules ['title'] = [
                    'required',
                    'min:3',
                    'max:255',
                    "unique:services, title, {$this->id}, id",
                ];
            }

        return $rules;
    }
}

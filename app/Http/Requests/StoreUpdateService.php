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
        return [   
                'title' => ['required','min:3','max:255'],

                'local' => ['required','min:3','max:255'],

                'description' => ['required','min:3','max:10000'],
            ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'O campo Tipo de Serviço é obrigatório.',
            'local.required' => 'O campo Local do Serviço é obrigatório.',
            'description.required' => 'O campo Descrição do Serviço é obrigatório.',
        ];
    } 
}

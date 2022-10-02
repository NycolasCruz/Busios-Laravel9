<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class ShopRequest extends FormRequest
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
            'name' => 'required',
            'branch' => 'required',
            'description' => 'nullable',
            'cpf' => 'required|min:11',
            'number' => 'required|min:15',
            'place' => 'required',
            'income' => 'required',
            'extras' => 'nullable',
            'user_id' => 'nullable'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'O nome é obrigatório',
            'branch.required' => 'O ramo é obrigatória',
            'cpf.required' => 'O CPF é obrigatório',
            'cpf.min' => 'O CPF deve ter 11 dígitos',
            'number.required' => 'O número é obrigatório',
            'number.min' => 'O número deve ter 15 dígitos',
            'place.required' => 'O endereço é obrigatório',
            'income.required' => 'O rendimento é obrigatório',
        ];
    }

    public function prepareForValidation()
    {
        $this->merge([
            'name' => Str::upper($this->name),
            'branch' => Str::upper($this->branch),
        ]);
    }
}

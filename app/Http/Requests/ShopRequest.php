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
            'shop_name' => 'required',
            'branch' => 'required',
            'description' => 'nullable',
            'cpf' => 'required|min:11',
            'number' => 'required|min:15',
            'address' => 'required',
            'income' => 'integer|required',
            'characteristics' => 'array',
            'characteristics.*' => 'integer|nullable',
            'user_id' => 'nullable'
        ];
    }

    public function messages()
    {
        return [
            'shop_name.required' => 'O nome da loja é obrigatório',
            'branch.required' => 'O ramo é obrigatória',
            'cpf.required' => 'O CPF é obrigatório',
            'cpf.min' => 'O CPF deve ter 11 dígitos',
            'number.required' => 'O número é obrigatório',
            'number.min' => 'O número deve ter 15 dígitos',
            'address.required' => 'O endereço é obrigatório',
            'income.required' => 'O rendimento é obrigatório',
            'income.integer' => 'O rendimento deve ser um número inteiro',
            'characteristics.array' => 'As características devem ser um array',
        ];
    }

    public function prepareForValidation()
    {
        $this->merge([
            'shop_name' => Str::upper($this->shop_name),
            'branch' => Str::upper($this->branch),
        ]);
    }
}

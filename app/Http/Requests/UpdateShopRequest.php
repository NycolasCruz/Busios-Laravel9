<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class UpdateShopRequest extends FormRequest
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
            'shop_name' => 'string|required',
            'branch' => 'string|required',
            'description' => 'string|nullable',
            'cpf' => 'string|required|size:14',
            'number' => 'string|required|size:15',
            'address' => 'string|required',
            'employees' => 'integer|required',
            'characteristics' => 'array',
            'characteristics.*' => 'integer|nullable',
        ];
    }

    public function messages()
    {
        return [
            'shop_name.required' => 'O nome da loja é obrigatório',
            'branch.required' => 'O ramo é obrigatória',
            'cpf.required' => 'O CPF é obrigatório',
            'cpf.size' => 'O CPF deve conter 14 caracteres',
            'number.required' => 'O número é obrigatório',
            'number.size' => 'O número deve conter 15 caracteres',
            'address.required' => 'O endereço é obrigatório',
            'employees.required' => 'O número de funcionários é obrigatório',
            'employees.integer' => 'O número de funcionários deve ser um número inteiro',
            'characteristics.array' => 'As características devem ser um array',
            'characteristics.*.integer' => 'As características devem ser um número inteiro',
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

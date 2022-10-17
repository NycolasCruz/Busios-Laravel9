<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class StoreCurriculumRequest extends FormRequest
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
            'curriculum' => 'string|required',
            'user_id' => [
                'integer',
                'nullable',
                Rule::unique('curriculum')->where('shop_id', $this->shop_id)
            ]
        ];
    }

    public function messages()
    {
        return [
            'curriculum.required' => 'O currículo é obrigatório',
            'user_id.unique' => 'Você já enviou um currículo para esta loja!'
        ];
    }
}

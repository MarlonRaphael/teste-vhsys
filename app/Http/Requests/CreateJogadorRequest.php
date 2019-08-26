<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateJogadorRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'avatar'        => ['bail', 'required', 'image', 'dimensions:min_width=100,min_height=200,max_width=500,max_height=500'], //size nullable
            'nome'          => ['bail', 'required', 'string', 'min:12', 'max:255'],
            'apelido'       => ['bail', 'required', 'string', 'min:12', 'max:255', 'unique:jogadores'],
            'altura'        => ['bail', 'required', 'numeric', 'between:0,99.99'],
            'peso'          => ['bail', 'required', 'numeric', 'between:0,99.99'],
            'pe'            => ['bail', 'required', 'string', 'in:destro,canhoto'],
            'posicao'       => ['bail', 'required', 'string', 'min:6', 'max:50'],
            'camisa'        => ['bail', 'required', 'integer', 'min:0'],
            'dt_nascimento' => ['bail', 'required', 'date'],
            'clube_id'      => ['bail', 'required', 'integer', 'exists:clubes,id']
        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateClubeRequest extends FormRequest
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
            'escudo'    => ['bail', 'required', 'image', 'dimensions:max_width=500,max_height=500'], //size nullable
            'nome'      => ['bail', 'required', 'string', 'min:6', 'max:255', 'unique:clubes'],
            'apelido'   => ['bail', 'required', 'string', 'min:3', 'max:255'],
            'mascote'   => ['bail', 'required', 'string', 'min:3', 'max:255'],
            'estadio'   => ['bail', 'required', 'string', 'min:3', 'max:255'],
            'fundacao'  => ['bail', 'required', 'date']
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
//    public function messages()
//    {
//        return [
//            'caminho_foto' => ['nullable', 'image', 'dimensions:min_width=100,min_height=200'], //size
//            'titulo' => ['bail', 'required', 'string', 'min:12', 'max:255', 'unique:posts'],
//            'descricao' => ['bail', 'required', 'string', 'min:6', 'max:255'],
//            'conteudo' => ['bail', 'required', 'string', 'min:6'],
//            'status' => ['boolean'],
//            'categoria_id' => ['required', 'integer', 'exists:categorias,id'],
////            'user_id' => ['required', 'integer', 'exists:users,id'],
////            'publish_at' => 'nullable|date',
//            'title.required' => 'A title is required',
//            'body.required'  => 'A message is required',
//            'required' => 'The :attribute field is required.',
//        ];
//    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'email' => 'email address',
        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateClubeRequest extends FormRequest
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
            'escudo'    => ['nullable', 'image', 'dimensions:max_width=500,max_height=500'],
            'nome'      => ['bail', 'required', 'string', 'min:6', 'max:255', 'unique:clubes,id,', $this->id],
            'apelido'   => ['bail', 'required', 'string', 'min:3', 'max:255'],
            'mascote'   => ['bail', 'required', 'string', 'min:3', 'max:255'],
            'estadio'   => ['bail', 'required', 'string', 'min:3', 'max:255'],
            'fundacao'  => ['bail', 'required', 'date']
        ];
    }
}

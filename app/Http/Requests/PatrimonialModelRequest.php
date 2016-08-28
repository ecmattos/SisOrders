<?php

namespace L52\Http\Requests;

use L52\Http\Requests\Request;

class PatrimonialModelRequest extends Request
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

    public function attributes()
    {
        return [
            'code'                  => 'Código',
            'description'           => 'Descrição'
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'code'                      => 'required|max:15|unique:patrimonial_models,code,'.$this->patrimonialModelId.',id,deleted_at,NULL',
            'description'               => 'required|max:40|unique:patrimonial_models,description,'.$this->patrimonialModelId.',id,deleted_at,NULL'
        ];
    }

    public function messages()
    {
        return [
            'required'  => ':attribute >> Preenchimento obrigatório.',
            'max'       => ':attribute >> MÁXIMO :max caracteres.',
            'unique'    => ':attribute >> Indisponível.'
        ];
    }
}
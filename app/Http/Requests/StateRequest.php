<?php

namespace L52\Http\Requests;

use L52\Http\Requests\Request;

class StateRequest extends Request
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
            'code'              => 'Código',
            'description'       => 'Descrição'
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
            'code'                      => 'required|max:2|unique:states,code,'.$this->serviceId.',id,deleted_at,NULL',
            'description'               => 'required|max:40|unique:states,description,'.$this->serviceId.',id,deleted_at,NULL'
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
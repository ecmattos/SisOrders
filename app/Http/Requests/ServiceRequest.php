<?php

namespace L52\Http\Requests;

use L52\Http\Requests\Request;

class ServiceRequest extends Request
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
            'description'       => 'Descrição',
            'unit'              => 'Unidade'
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
            'code'          => 'max:15|required|unique:services,code,'.$this->serviceId.',id,deleted_at,NULL',
            'description'   => 'max:100|required|unique:services,description,'.$this->serviceId.',id,deleted_at,NULL',
            'unit'          => 'required'
            //
        ];
    }

    public function messages()
    {
        return [
            'max' => ':attribute >> MÁXIMO :max caracteres.',
            'required' => ':attribute >> Preenchimento obrigatório.',
            'unique' => ':attribute >> Indisponível.'
        ];
    }
}

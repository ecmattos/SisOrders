<?php

namespace L52\Http\Requests;

use L52\Http\Requests\Request;

class ContractRequest extends Request
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

            'client_id'         => 'Cliente',
            'manager_id'        => 'Gestor',
            'date_start'        => 'Data início',
            'date_end'          => 'Data término'
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
            'code'              => 'required|unique:contracts,code,'.$this->contractId.',id,deleted_at,NULL',
            'description'       => 'max:200|required|unique:contracts,description,'.$this->contractId.',id,deleted_at,NULL',
            'client_id'         => 'required',
            'manager_id'        => 'required',
            'date_start'        => 'required|date_format:d/m/Y',
            'date_end'          => 'required|date_format:d/m/Y'
            //
        ];
    }

    public function messages()
    {
        return [
            'required'      => ':attribute >> Preenchimento obrigatório.',
            'max'           => ':attribute >> MÁXIMO :max caracteres.',
            'unique'        => ':attribute >> Indisponível.',
            'date_format'   => ':attribute >> Inválido.'
        ];
    }
}
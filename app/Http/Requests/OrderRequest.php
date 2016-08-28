<?php

namespace L52\Http\Requests;

use L52\Http\Requests\Request;

class OrderRequest extends Request
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
            'contract_id'           => 'Contrato',
            'requested_services'    => 'Serviços solicitados',
            'request_doc'           => 'Documento',
            'requester'             => 'Solicitante',
            'phone'                 => 'Telefone',
            'date_check_in'         => 'Data entrada',
            'date_check_out'        => 'Data saída'
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
            'requested_services'        => 'max:250|required',
            'requester'                 => 'max:20|required',
            'request_doc'               => 'max:20',
            'phone'                     => 'telefone'
            //
        ];
    }

    public function messages()
    {
        return [
            'required'  => ':attribute >> Preenchimento obrigatório.',
            'max'       => ':attribute >> MÁXIMO :max caracteres.',
            'telefone'  => ':attribute >> Inválido.'
        ];
    }
}
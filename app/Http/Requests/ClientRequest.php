<?php

namespace L52\Http\Requests;

use L52\Http\Requests\Request;

class ClientRequest extends Request
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
            'client_type_id'    => 'Tipo de Cliente',
            'code'              => 'CNPJ/CPF',
            'description'       => 'Razão Social',
            'description_short' => 'Nome Fantasia',
            'email'             => 'E-mail',
            'address'           => 'Endereço',
            'neighborhood'      => 'Bairro',
            'contact'           => 'Contato',
            'city_id'           => 'Cidade',
            'zip_code'          => 'CEP',
            'phone'             => 'Telefone',
            'mobile'            => 'Celular'
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
            'client_type_id'            => 'required',
            'code'                      => 'cnpj_cpf|required|unique:clients,code,'.$this->clientId.',id,deleted_at,NULL',
            'description'               => 'max:100|required|unique:clients,description,'.$this->clientId.',id,deleted_at,NULL',
            'description_short'         => 'max:50|required|unique:clients,description_short,'.$this->clientId.',id,deleted_at,NULL',
            'email'                     => 'max:100|email|unique:clients,email,'.$this->clientId.',id,deleted_at,NULL',
            'address'                   => 'required',
            'neighborhood'              => 'required',
            'city_id'                   => 'required',
            'zip_code'                  => 'required|digits:8',
            'contact'                   => 'max:30|required',
            'phone'                     => 'telefone',
            'mobile'                    => 'celular'
            //
        ];
    }

    public function messages()
    {
        return [
            'required'  => ':attribute >> Preenchimento obrigatório.',
            'max'       => ':attribute >> MÁXIMO :max caracteres.',
            'unique'    => ':attribute >> Indisponível.',
            'cnpj_cpf'  => ':attribute >> Inválido.',
            'telefone'  => ':attribute >> Inválido.',
            'celular'   => ':attribute >> Inválido.',
            'email'     => ':attribute >> Inválido.'
        ];
    }
}
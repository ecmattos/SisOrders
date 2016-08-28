<?php

namespace L52\Http\Requests;

use L52\Http\Requests\Request;

class RoleRequest extends Request
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
            'name'          => 'Nome',
            'display_name'  => 'Display Name',
            'description'   => 'Descrição',
            'permission'    => 'Permissão'

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
            'name'          => 'required|unique:roles,name,'.$this->id.',id,deleted_at,NULL',
            'display_name'  => 'required|unique:roles,display_name,'.$this->id.',id,deleted_at,NULL',
            'description'   => 'required',
            'permission'    => 'required'
        ];
    }

    public function messages()
    {
        return [
            'required'  => ':attribute >> Preenchimento obrigatório.',
            'unique'    => ':attribute >> Indisponível.'
        ];
    }
}
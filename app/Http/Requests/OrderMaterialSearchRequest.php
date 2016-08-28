<?php

namespace L52\Http\Requests;

use L52\Http\Requests\Request;

class OrderMaterialSearchRequest extends Request
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
            'code'          => 'Código',
            'description'   => 'Descrição'
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
            'description'   => 'required_without_all:code'
            //
        ];
    }

    public function messages()
    {
        return [
            'required_without_all' => 'Ao MENOS UM campo deve ser preenchido.'
        ];
    }
}
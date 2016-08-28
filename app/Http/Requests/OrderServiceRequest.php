<?php

namespace L52\Http\Requests;

use L52\Http\Requests\Request;

class OrderServiceRequest extends Request
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
            'discount'      => 'Desconto',
            'service_qty'   => 'Quantidade'
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
            'discount'      => 'required',
            'service_qty'   => 'required'
            //
        ];
    }

    public function messages()
    {
        return [
            'required' => ':attribute >> Preenchimento obrigatório.'
        ];
    }
}

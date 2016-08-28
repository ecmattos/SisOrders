<?php

namespace L52\Http\Requests;

use L52\Http\Requests\Request;

class OrderCartRequest extends Request
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
            'cart_code'             => 'Código Proposta',
            'cart_date'             => 'Data Proposta',
            'delivery_time_days'    => 'Prazo de Entrega',
            'payment_condition'     => 'Condições pagamento',
            'portage'               => 'Transporte'
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
            'cart_code'             => 'required',
            'cart_date'             => 'required|date_format:d/m/Y',
            'delivery_time_days'    => 'required|integer',
            'payment_condition'     => 'required|integer',
            'portage'               => 'required'
            //
        ];
    }

    public function messages()
    {
        return [
            'required'      => ':attribute >> Preenchimento obrigatório.',
            'integer'       => ':attribute >> Inválido.',
            'date_format'   => ':attribute >> Inválido.'
        ];
    }
}
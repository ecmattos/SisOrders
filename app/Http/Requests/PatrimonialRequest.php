<?php

namespace L52\Http\Requests;

use L52\Http\Requests\Request;

class PatrimonialRequest extends Request
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
            'client_id'                 => 'Cliente',
            'code'                      => 'Código',
            'code_client'               => 'Patrimônio',
            'patrimonial_type_id'       => 'Tipo do Equipamento',
            'patrimonial_sub_type_id'   => 'Sub-Tipo do Equipamento',
            'patrimonial_brand_id'      => 'Marca do Equipamento',
            'patrimonial_model_id'      => 'Modelo do Equipamento',
            'serial'                    => 'Nr de série'
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
            'client_id'                 => 'required',
            'code'                      => 'unique:patrimonials,code,'.$this->patrimonialId.',id,deleted_at,NULL',
            'code_client'               => 'required',
            'patrimonial_type_id'       => 'required',
            'patrimonial_sub_type_id'   => 'required',
            'patrimonial_brand_id'      => 'required',
            'patrimonial_model_id'      => 'required',
            'serial'                    => 'required'
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

<?php

namespace L52\Http\Requests;

use L52\Http\Requests\Request;

class MaterialRequest extends Request
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
            'material_unit_id'  => 'Unidade'
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
            'code' => 'max:15|required|unique:materials,code,'.$this->materialId.',id,deleted_at,NULL',
            'description' => 'max:100|required|unique:materials,description,'.$this->materialId.',id,deleted_at,NULL',
            'material_unit_id' => 'required'
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

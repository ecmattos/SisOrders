<?php

namespace L52\Http\Requests;

use L52\Http\Requests\Request;

class MaterialUnitRequest extends Request
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
            'description'       => 'Descrição'
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
            'code' => 'max:5|required|unique:material_units,code,'.$this->materialUnitId.',id,deleted_at,NULL',
            'description' => 'max:20|required|unique:material_units,description,'.$this->materialUnitId.',id,deleted_at,NULL'
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

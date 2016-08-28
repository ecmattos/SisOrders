<?php

namespace L52\Http\Requests;

use L52\Http\Requests\Request;

class CityRequest extends Request
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
            'state_id'          => 'Estado',
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
            'state_id'               => 'required',
            'description'            => 'required|max:40|unique:cities,description,'.$this->cityId.',id,deleted_at,NULL'
        ];
    }

    public function messages()
    {
        return [
            'required'  => ':attribute >> Preenchimento obrigatório.',
            'max'       => ':attribute >> MÁXIMO :max caracteres.',
            'unique'    => ':attribute >> Indisponível.'
        ];
    }
}
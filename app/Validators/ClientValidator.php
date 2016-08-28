<?php

namespace L52\Validators;

#use \Prettus\Validator\Exceptions\ValidatorException;
#use Illuminate\Support\MessageBag;
use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

class ClientValidator extends LaravelValidator
{
    protected $id;
    
    protected $attributes =
    [
    	'code' => 'CNPJ/CPF',
    	'description' => 'Descrição',
    	'description_short' => 'Razão Social',
    ];

    protected $rules = 
    [
    	ValidatorInterface::RULE_CREATE =>
    	[
    		'code'                      => 'cnpj_cpf|required|unique:clients,code',
            'description'               => 'max:100|required|unique:clients,description',
            'description_short'         => 'max:50|required|unique:clients,description_short',
            'email'                     => 'max:100|email|unique:clients,email',
            'address'                   => 'required',
            'neighborhood'              => 'required',
            'city_id'                   => 'required',
            'zip_code'                  => 'required|digits:8',
            'phone'                     => 'telefone',
            'mobile'                    => 'celular'
		],

		ValidatorInterface::RULE_UPDATE =>
    	[
            'code'                      => 'cnpj_cpf|required|unique:clients,code',
            'description'               => 'max:100|required|unique:clients,description',
            'description_short'         => 'max:50|required|unique:clients,description_short',
            'email'                     => 'max:100|email|unique:clients,email',
            'address'                   => 'required',
            'neighborhood'              => 'required',
            'city_id'                   => 'required',
            'zip_code'                  => 'required|digits:8',
            'phone'                     => 'telefone',
            'mobile'                    => 'celular'
		]

        #$validator = Validator::make($input, $rules, $messages);
	];

	protected $messages = 
    [
        'required' 	=> '<b>:attribute</b> >> Preenchimento obrigatório.',
        'max'      	=> '<b>:attribute</b> >> MÁXIMO :max caracteres.',
        'unique'   	=> '<b>:attribute</b> >> Indisponível.',
        'cnpj_cpf'  => '<b>:attribute</b> >> Inválido.',
        'telefone'  => '<b>:attribute</b> >> Inválido.',
        'celular'   => '<b>:attribute</b> >> Inválido.',
        'email'   	=> '<b>:attribute</b> >> Inválido.'
    ];

    public function setId($id)
    {   
        $this->id = $id;
    }
}

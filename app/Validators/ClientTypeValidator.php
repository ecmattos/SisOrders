<?php

namespace L52\Validators;

#use \Prettus\Validator\Exceptions\ValidatorException;
#use Illuminate\Support\MessageBag;
use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

class ClientTypeValidator extends LaravelValidator
{
    protected $id;
    
    protected $attributes =
    [
    	'code' => 'Código',
    	'description' => 'Descrição'
    ];

    protected $rules = 
    [
    	ValidatorInterface::RULE_CREATE =>
    	[
    		'code'  		=> 'required|max:3|unique:client_types,code',
			'description' 	=> 'required|max:30|unique:client_types,description'
		],

		ValidatorInterface::RULE_UPDATE =>
    	[
            'code'  		=> 'required|max:3|unique:client_types,code',
			'description' 	=> 'required|max:30|unique:client_types,description'
		]

        #$validator = Validator::make($input, $rules, $messages);
	];

	protected $messages = 
    [
        'required' => '<b>:attribute</b> >> Preenchimento obrigatório.',
        'max'      => '<b>:attribute</b> >> MÁXIMO :max caracteres.',
        'unique'   => '<b>:attribute</b> >> Indisponível.'
    ];

    public function setId($id)
    {   
        $this->id = $id;
    }
}

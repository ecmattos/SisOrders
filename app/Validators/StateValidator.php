<?php

namespace L52\Validators;

use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\LaravelValidator;

class StateValidator extends LaravelValidator
{
    protected $attributtes =
    [
    	'code' => 'Código',
    	'description' => 'Descrição'
    ];

    protected $rules = 
    [
    	ValidatorInterface::RULE_CREATE =>
    	[
    		'code'  		=> 'required|max:2|unique:states,code',
			'description' 	=> 'required|max:30|unique:states,description'
		],

		ValidatorInterface::RULE_UPDATE =>
    	[
    		#'code'  		=> 'required|max:3|unique:states,code,' . $id . ',id,deleted_at,NULL',
			#'description' 	=> 'required|max:30|unique:states,description,' . $id . ',id,deleted_at,NULL'
		]
	];

	protected $messages = [
	    'required'	=> '<b>:attribute</b> >> Preenchimento obrigatório.',
        'max' 		=> '<b>:attribute</b> >> MÁXIMO :max caracteres.',
        'unique' 	=> '<b>:attribute</b> >> Indisponível.'
    ];
}


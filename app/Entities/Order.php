<?php

namespace L52\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;
use Illuminate\Database\Eloquent\SoftDeletes;
use Venturecraft\Revisionable\Revisionable;

use Carbon\Carbon;
use DB;

class Order extends Revisionable implements Transformable
{
    use TransformableTrait;
    use SoftDeletes;

    #Revisionable - Start
    protected $revisionEnabled = true;
    protected $revisionCleanup = true; //Remove old revisions (works only when used with $historyLimit)
    protected $historyLimit = 9999999; //Maintain a maximum of 500 changes at any point of time, while cleaning up old revisions.
    protected $revisionCreationsEnabled = true;
    protected $dontKeepRevisionOf = [];
    #protected $revisionFormattedFields = array('title'  => 'string:<strong>%s</strong>', 'public' => 'boolean:No|Yes', 'deleted_at' => 'isEmpty:Active|Deleted');
    protected $revisionFormattedFieldNames = [
        'patrimonial_id'  		=> 'Equipamento',
    	'contract_id'	  		=> 'Contrato',
    	'requested_services'	=> 'Serviços solicitados',
        'request_doc'           => 'Documento',
        'requester'             => 'Solicitante',
        'phone'                 => 'Telefone',
    	'date_check_in'			=> 'Data entrada',
    	'date_check_out'		=> 'Data saída',
    	'order_status_id' 		=> 'Situação',
    	'date_status_1' 		=> 'Data situação 1',
    	'date_status_2'			=> 'Data situação 2',
 		'date_status_3'			=> 'Data situação 3',
 		'date_status_4'			=> 'Data situação 4',
 		'date_status_5'			=> 'Data situação 5',
 		'date_status_6'			=> 'Data situação 6',
 		'date_status_7'			=> 'Data situação 7',
        'cart_code'             => 'Código proposta',
        'cart_date'             => 'Data proposta',
        'delivery_time_days'    => 'Prazo de entrega',
        'payment_condition'     => 'Condições pagamento',
        'portage'               => 'Transporte',
        'deleted_at' 			=> 'Excluído'
    ];
    protected $revisionNullString = 'nada';
    protected $revisionUnknownString = 'desconhecido';

    public function identifiableName() 
    {
        return $this->description;
    }
    #Revisionable - End
    
    protected $dates = [
    	'cart_date',
        'date_status_1',
        'date_status_2',
        'date_status_3',
        'date_status_4',
        'date_status_5',
        'date_status_6',
        'date_status_7',
        'deleted_at'
    ];

    protected $fillable = [
    	'patrimonial_id',
    	'contract_id',
    	'requested_services',
        'request_doc',
        'requester',
        'phone',
        'cart_code',
        'cart_date',
        'delivery_time_days',
        'payment_condition',
        'portage',
    	'date_check_in',
    	'date_check_out',
    	'order_status_id',
    	'date_status_1',
    	'date_status_2',
 		'date_status_3',
 		'date_status_4',
 		'date_status_5',
 		'date_status_6',
 		'date_status_7'
    ];

    public function patrimonial()
    {
        return $this->belongsTo('L52\Entities\Patrimonial'); 
    }

    public function contract()
    {
        return $this->belongsTo('L52\Entities\Contract'); 
    }

    public function order_status()
    {
        return $this->belongsTo('L52\Entities\OrderStatus'); 
    }

    public function services()
    {
        //    $this->belongsToMany('relacao', 'nome da tabela pivot', 'key ref. books em pivot', 'key ref. author em pivot')
        return $this->belongsToMany('L52\Entities\Service', 'L52\Entities\OrderService', 'order_id', 'service_id');
    }

    public function order_services()
    {
        return $this->hasMany('L52\Entities\OrderService');
    }
}

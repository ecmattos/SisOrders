<?php

namespace L52\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;
use Illuminate\Database\Eloquent\SoftDeletes;
use Venturecraft\Revisionable\Revisionable;
use DB;

class OrderService extends Revisionable implements Transformable
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
        'order_id'				=> 'Ordem Serviço',
    	'service_id'			=> 'Serviço',
    	'service_qty'			=> 'Quantidade',
    	'sale_value'			=> 'Valor unitário',
    	'discount'	            => 'Desconto',
        'factor'                => 'Fator',
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
        'deleted_at'
    ];

    protected $fillable = [
    	'order_id',
    	'service_id',
    	'service_qty',
    	'sale_value',
    	'discount',
        'factor'
    ];

    public function service()
    {
        return $this->belongsTo('L52\Entities\Service');
    }

    public function order()
    {
        return $this->belongsTo('L52\Entities\Order');
    }
}
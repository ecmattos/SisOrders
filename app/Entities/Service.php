<?php

namespace L52\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;
use Illuminate\Database\Eloquent\SoftDeletes;
use Venturecraft\Revisionable\Revisionable;
use DB;

class Service extends Revisionable implements Transformable
{
    use TransformableTrait;

    use SoftDeletes;
    protected $dates = [
        'deleted_at'
    ];

    protected $revisionEnabled = true;
    protected $revisionCleanup = true; //Remove old revisions (works only when used with $historyLimit)
    protected $historyLimit = 9999999; //Maintain a maximum of 500 changes at any point of time, while cleaning up old revisions.
    protected $revisionCreationsEnabled = true;
    protected $dontKeepRevisionOf = [];
    #protected $revisionFormattedFields = array('title'  => 'string:<strong>%s</strong>', 'public' => 'boolean:No|Yes', 'deleted_at' => 'isEmpty:Active|Deleted');
    protected $revisionFormattedFieldNames = [
    	'code' => 'Código',
    	'description' => 'Descrição',
        'unit' => 'Unidade',
        'cost_value' => 'Valor de custo',
        'sale_value' => 'Valor de venda',
        'deleted_at' => 'Excluído'
    ];
    protected $revisionNullString = 'NULL';
    protected $revisionUnknownString = '(vazio)';

    public function identifiableCode() 
    {
        return $this->code;
    }

    protected $fillable = [
    	'code',
    	'description',
    	'unit',
        'cost_value',
        'sale_value',
        'stock_qty'
    ];

    public function orders()
    {
        //$this->belongsToMany('relacao', 'nome da tabela pivot', 'key ref. authors em pivot', 'key ref. books em pivot')
        return $this->belongsToMany('L52\Entities\Order','L52\Entities\OrderService', 'service_id', 'order_id');
    }

}

<?php

namespace L52\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;
use Illuminate\Database\Eloquent\SoftDeletes;
use Venturecraft\Revisionable\Revisionable;
#use Carbon\Carbon;
#use DB;

class Contract extends Revisionable implements Transformable
{
    use TransformableTrait;
    use SoftDeletes;

    protected $dates = [
        'date_start',
        'date_end',
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
        'client_id' => 'Cliente',
        'manager_id' => 'Gestor',
        'date_start' => 'Data de início',
        'date_end' => 'Data final',
        'factor_service' => 'Fator de serviço',
        'factor_material' => 'Fator de material',
        'deleted_at' => 'Excluído'
    ];
    protected $revisionNullString = 'nada';
    protected $revisionUnknownString = 'desconhecido';

    public function identifiableName() 
    {
        return $this->description;
    }

    protected $fillable = [
        'code',
        'description',
        'client_id',
        'manager_id',
        'date_start',
        'date_end',
        'factor_service',
        'factor_material'
    ];

    public function client()
    {
        return $this->belongsTo('L52\Entities\Client'); 
    }

    public function manager()
    {
        return $this->belongsTo('L52\Entities\User', 'manager_id', 'id'); 
    }

    public function orders()
    {
        return $this->hasMany('L52\Entities\Orders'); 
    }
}

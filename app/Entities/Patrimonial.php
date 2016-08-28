<?php

namespace L52\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;
use Illuminate\Database\Eloquent\SoftDeletes;
use Venturecraft\Revisionable\Revisionable;
use DB;

class Patrimonial extends Revisionable implements Transformable
{
    use TransformableTrait;

    use SoftDeletes;

    protected $revisionEnabled = true;
    protected $revisionCleanup = true; //Remove old revisions (works only when used with $historyLimit)
    protected $historyLimit = 9999999; //Maintain a maximum of 500 changes at any point of time, while cleaning up old revisions.
    protected $revisionCreationsEnabled = true;
    protected $dontKeepRevisionOf = [];
    #protected $revisionFormattedFields = array('title'  => 'string:<strong>%s</strong>', 'public' => 'boolean:No|Yes', 'deleted_at' => 'isEmpty:Active|Deleted');
    protected $revisionFormattedFieldNames = [
        'code' => 'Código',
        'code_client' => 'Código Cliente',
        'description' => 'Descrição',
        'patrimonial_type_id' => 'Tipo',
        'patrimonial_sub_type_id' => 'Sub-tipo',
        'patrimonial_brand_id' => 'Marca',
        'patrimonial_model_id' => 'Modelo',
        'client_id' => 'Cliente',
        'serial' => 'Nr serial',
        'comments' => 'Observações', 
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
    	'code_client',
    	'description',
    	'patrimonial_type_id',
    	'patrimonial_sub_type_id',
    	'patrimonial_brand_id',
    	'patrimonial_model_id',
    	'client_id',
    	'serial',
    	'comments'
    ];
    
    public function patrimonial_type()
    {
        return $this->belongsTo('L52\Entities\PatrimonialType'); 
    }

    public function patrimonial_sub_type()
    {
        return $this->belongsTo('L52\Entities\PatrimonialSubType'); 
    }

    public function patrimonial_brand()
    {
        return $this->belongsTo('L52\Entities\PatrimonialBrand'); 
    }

    public function patrimonial_model()
    {
        return $this->belongsTo('L52\Entities\PatrimonialModel'); 
    }

    public function client()
    {
        return $this->belongsTo('L52\Entities\Client'); 
    }

    public function orders()
    {
        return $this->hasMany('L52\Entities\Orders'); 
    }
}

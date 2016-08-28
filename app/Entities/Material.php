<?php

namespace L52\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;
use Illuminate\Database\Eloquent\SoftDeletes;
use Venturecraft\Revisionable\Revisionable;
use DB;

class Material extends Revisionable implements Transformable
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
        'material_unit_id' => 'Unidade',
        'cost_value' => 'Valor de custo',
        'sale_value' => 'Valor de venda',
        'stock_qyt'  => 'Qte estoque',
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
    	'material_unit_id',
        'cost_value',
        'sale_value',
        'stock_qty'
    ];

    public function material_unit()
    {
        return $this->belongsTo('L52\Entities\MaterialUnit'); 
    }

    public function getCodeDescriptionAttribute()
    {
        return $this->code.' - '.$this->description;
    }

    public function getCodeDescriptionUnitAttribute()
    {
        return $this->code.' - '.$this->description.' ('.$this->material_unit->code.')';
    }

    public function patrimonial_materials()
    {
        return $this->hasMany('SisConPat\PatrimonialMaterial'); 
    }


}

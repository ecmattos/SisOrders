<?php

namespace L52\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;
use Illuminate\Database\Eloquent\SoftDeletes;
use Venturecraft\Revisionable\Revisionable;
use DB;
use JansenFelipe\Utils\Utils as Utils;
use JansenFelipe\Utils\Mask as Mask;

class Client extends Revisionable implements Transformable
{
    use TransformableTrait;
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $revisionEnabled = true;
    protected $revisionCleanup = true; //Remove old revisions (works only when used with $historyLimit)
    protected $historyLimit = 9999999; //Maintain a maximum of 500 changes at any point of time, while cleaning up old revisions.
    protected $revisionCreationsEnabled = true;
    protected $dontKeepRevisionOf = [];
    #protected $revisionFormattedFields = array('title'  => 'string:<strong>%s</strong>', 'public' => 'boolean:No|Yes', 'deleted_at' => 'isEmpty:Active|Deleted');
    protected $revisionFormattedFieldNames = [
        'description' => 'Razão Social',
        'description_short' => 'Nome fantasia',
        'code' => 'CPF/CNPJ',
        'address' => 'Endereço',
        'zip_code' => 'CEP',
        'neighborhood' => 'Bairro',
        'contact' => 'Contato',
        'phone' => 'Telefone',
        'mobile' => 'Celular',
        'email' => 'E-mail', 
        'client_type_id' => 'Tipo de Cliente',
        'city_id' => 'Cidade',
        'comments' => 'Observações',
        'deleted_at' => 'Excluído'
    ];
    protected $revisionNullString = 'nada';
    protected $revisionUnknownString = 'desconhecido';

    public function identifiableName() 
    {
        return $this->description;
    }

    protected $fillable = [
        'description',
        'description_short',
        'code',
        'address',
        'zip_code',
        'neighborhood',
        'contact',
        'phone',
        'mobile',
        'email',
        'client_type_id',
        'city_id',
        'comments'
    ];

    public function getCodeMaskAttribute($value)
    {
        $value = $this->code;

        if ($this->client_type_id == 1)
        {
        	$code_mask = Utils::mask($value, Mask::CNPJ);
        }
        else
        {
        	$code_mask = Utils::mask($value, Mask::CPF);
        }

        return $code_mask;
    }

    public function getZipCodeMaskAttribute($value)
    {
        $value = $this->zip_code;
        
        $zip_code_mask = Utils::mask($value, Mask::CEP);

        return $zip_code_mask;
    }

    public function getPhoneMaskAttribute($value)
    {
        $value = $this->phone;
        
        $phone_mask =  Utils::mask($value, '(##) ####-####');

        return $phone_mask;
    }

    public function getMobileMaskAttribute($value)
    {
        $value = $this->mobile;
        
        $mobile_mask = Utils::mask($value, '(##) ####-####');
        
        return $mobile_mask;
    }

    public function getCnpjMaskDescriptionAttribute()
    {
        return $this->cnpj_mask.' - '.$this->description;
    }

    public function city()
    {
        return $this->belongsTo('L52\Entities\City'); 
    }

    public function client_type()
    {
        return $this->belongsTo('L52\Entities\ClientType'); 
    }

    public function patrimonials()
    {
        return $this->hasMany('L52\Entities\Patrimonial');   
    }

    public function contracts()
    {
        return $this->belongsTo('L52\Entities\Contract'); 
    }
}

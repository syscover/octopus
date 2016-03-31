<?php namespace Syscover\Octopus\Models;

use Syscover\Pulsar\Models\Model;
use Illuminate\Support\Facades\Validator;
use Syscover\Pulsar\Traits\TraitModel;
use Sofa\Eloquence\Eloquence;
use Sofa\Eloquence\Mappable;

/**
 * Class Laboratory
 *
 * Model with properties
 * <br><b>[id, company_name, tin, country, territorial_area_1, territorial_area_2, territorial_area_3, cp, locality, address, contact, phone, email, web, favorite]</b>
 *
 * @package Syscover\Octopus\Models
 */

class Laboratory extends Model {

    use TraitModel;
    use Eloquence, Mappable;

	protected $table        = '008_073_laboratory';
    protected $primaryKey   = 'id_073';
    protected $suffix       = '073';
    public $timestamps      = false;
    protected $fillable     = ['id_073', 'company_name_073', 'tin_073', 'country_073', 'territorial_area_1_073', 'territorial_area_2_073', 'territorial_area_3_073', 'cp_073', 'locality_073', 'address_073', 'contact_073', 'phone_073', 'email_073', 'web_073', 'favorite_073'];
    protected $maps         = [];
    protected $relationMaps = [];
    private static $rules   = [
        'companyName'   => 'required|between:2,100',
        'tin'           => 'between:2,50',
        'country'       => 'not_in:null',
        'cp'            => 'between:0,10',
        'locality'      => 'between:0,100',
        'address'       => 'required|between:0,150',
        'contact'       => 'between:0,100',
        'phone'         => 'between:0,50',
        'email'         => 'email|between:0,100',
        'web'           => 'between:0,100'
    ];

    public static function validate($data)
    {
        return Validator::make($data, static::$rules);
	}

    public function scopeBuilder($query)
    {
        return $query;
    }
}
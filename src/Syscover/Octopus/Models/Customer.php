<?php namespace Syscover\Octopus\Models;

use Syscover\Pulsar\Models\Model;
use Illuminate\Support\Facades\Validator;
use Syscover\Pulsar\Traits\TraitModel;
use Sofa\Eloquence\Eloquence;
use Sofa\Eloquence\Mappable;

/**
 * Class Customer
 *
 * Model with properties
 * <br><b>[id, code, company_name, tin, country, territorial_area_1, territorial_area_2, territorial_area_3_072, cp, locality, address, contact, phone, email, web]</b>
 *
 * @package Syscover\Octopus\Models
 */

class Customer extends Model {

    use TraitModel;
    use Eloquence, Mappable;

	protected $table        = '008_075_customer';
    protected $primaryKey   = 'id_075';
    protected $suffix       = '075';
    public $timestamps      = false;
    protected $fillable     = ['id_075', 'code_075', 'company_name_075', 'tin_075', 'country_075', 'territorial_area_1_075', 'territorial_area_2_075', 'territorial_area_3_072', 'cp_075', 'locality_075', 'address_075', 'contact_075', 'phone_075', 'email_075', 'web_075'];
    protected $maps         = [];
    protected $relationMaps = [];
    private static $rules   = [
        'code'          => 'between:2,50',
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
}
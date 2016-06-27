<?php namespace Syscover\Octopus\Models;

use Syscover\Pulsar\Core\Model;
use Sofa\Eloquence\Eloquence;
use Sofa\Eloquence\Mappable;
use Illuminate\Support\Facades\Validator;

/**
 * Class Company
 *
 * Model with properties
 * <br><b>[id, company_name, tin, country_id, territorial_area_1_id, territorial_area_2_id, territorial_area_3_id, cp, locality, address, contact, phone, email, web]</b>
 *
 * @package Syscover\Octopus\Models
 */

class Company extends Model
{
    use Eloquence, Mappable;

	protected $table        = '008_074_company';
    protected $primaryKey   = 'id_074';
    protected $suffix       = '074';
    public $timestamps      = false;
    protected $fillable     = ['id_074', 'company_name_074', 'tin_074', 'country_id_074', 'territorial_area_1_id_074', 'territorial_area_2_id_074', 'territorial_area_3_id_074', 'cp_074', 'locality_074', 'address_074', 'contact_074', 'phone_074', 'email_074', 'web_074'];
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
}
<?php namespace Syscover\Octopus\Models;

/**
 * @package	    Pulsar
 * @author	    Jose Carlos Rodríguez Palacín
 * @copyright   Copyright (c) 2015, SYSCOVER, SL
 * @license
 * @link		http://www.syscover.com
 * @since		Version 2.0
 * @filesource
 */

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;
use Syscover\Pulsar\Traits\ModelTrait;

class Laboratory extends Model {

    use ModelTrait;

	protected $table        = '008_073_laboratory';
    protected $primaryKey   = 'id_073';
    public $timestamps      = false;
    protected $fillable     = ['id_073', 'company_name_073', 'tin_073', 'country_073', 'territorial_area_1_073', 'territorial_area_2_073', 'territorial_area_3_072', 'cp_073', 'locality_073', 'address_073', 'contact_073', 'phone_073', 'email_073', 'web_073'];
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
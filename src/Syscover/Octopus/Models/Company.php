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

class Company extends Model {

    use ModelTrait;

	protected $table        = '008_074_company';
    protected $primaryKey   = 'id_074';
    public $timestamps      = false;
    protected $fillable     = ['id_074', 'company_name_074', 'tin_074', 'country_074', 'territorial_area_1_074', 'territorial_area_2_074', 'territorial_area_3_072', 'cp_074', 'locality_074', 'address_074', 'contact_074', 'phone_074', 'email_074', 'web_074'];
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
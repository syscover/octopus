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

class Shop extends Model {

    use ModelTrait;

	protected $table        = '008_076_shop';
    protected $primaryKey   = 'id_076';
    public $timestamps      = false;
    protected $fillable     = ['id_076', 'customer_076', 'name_076', 'tin_076', 'country_076', 'territorial_area_1_076', 'territorial_area_2_076', 'territorial_area_3_072', 'cp_076', 'locality_076', 'address_076', 'contact_076', 'phone_076', 'email_076', 'web_076'];
    private static $rules   = [
        'customerid'    => 'required',
        'name'          => 'required|between:2,100',
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

    public function addresses()
    {
        return Shop::hasMany('Syscover\Octopus\Models\Address','shop_077');
    }

    public function favoriteAddress()
    {
        return Shop::hasMany('Syscover\Octopus\Models\Address','shop_077')->where('favorite_077', true);
    }

    public static function getCustomRecordsLimit()
    {
        return Shop::join('008_075_customer', '008_076_shop.customer_076', '=', '008_075_customer.id_075')->newQuery();
    }
}
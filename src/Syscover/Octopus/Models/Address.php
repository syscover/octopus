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
use Syscover\Pulsar\Traits\TraitModel;

class Address extends Model {

    use TraitModel;

	protected $table        = '008_077_address';
    protected $primaryKey   = 'id_077';
    public $timestamps      = false;
    protected $fillable     = ['id_077', 'shop_077', 'alias_077', 'business_077', 'name_077', 'surname_077', 'country_077', 'territorial_area_1_077', 'territorial_area_2_077', 'territorial_area_3_072', 'cp_077', 'locality_077', 'address_077', 'phone_077', 'email_077', 'favorite_077', 'latitude_077', 'longitude_077'];
    private static $rules   = [
        'alias'         => 'between:2,100',
        'business'      => 'between:2,100',
        'name'          => 'between:2,50',
        'surname'       => 'between:2,50',
        'country'       => 'not_in:null',
        'cp'            => 'between:0,10',
        'locality'      => 'between:0,100',
        'address'       => 'required|between:0,150',
        'phone'         => 'between:0,50',
        'email'         => 'email|between:0,100',
        'latitude'      => 'between:2,50',
        'longitude'     => 'between:2,50'
    ];

    public static function validate($data)
    {
        return Validator::make($data, static::$rules);
	}

    public static function addToGetIndexRecords($parameters)
    {
        return Address::where('shop_077', $parameters['ref'])->newQuery();
    }

    public function customCount($parameters)
    {
        return Address::where('shop_077', $parameters['ref'])->newQuery();
    }

    public static function resetFavorite($shop)
    {
        Address::where('shop_077', $shop)->update(['favorite_077' => 0]);
    }

    public static function getFavoriteAddressShop($shop)
    {
        return Address::where('shop_077', $shop)->where('favorite_077', 1)->first();
    }
}
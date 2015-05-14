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

class Request extends Model {

    use ModelTrait;

	protected $table        = '008_078_request';
    protected $primaryKey   = 'id_078';
    public $timestamps      = false;
    protected $fillable     = ['id_078', 'order_078', 'committed_078', 'supervisor_078', 'customer_078', 'shop_078', 'company_078', 'family_078', 'brand_078', 'product_078', 'id_address_078', 'company_name_078', 'name_078', 'surname_078', 'country_078', 'territorial_area_1_078', 'territorial_area_2_078', 'territorial_area_3_072', 'cp_078', 'locality_078', 'address_078', 'phone_078', 'email_078', 'observations_078', 'date_078', 'view_height_078', 'view_width_078', 'total_height_078', 'total_width_078', 'units_078', 'expiration_078', 'attached_078', 'comments_078'];
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

    public static function getCustomRecordsLimit()
    {
        return Request::join('008_075_customer', '008_078_request.customer_078', '=', '008_075_customer.id_075')
            ->join('008_076_shop', '008_078_request.shop_078', '=', '008_076_shop.id_076')
            ->newQuery();
    }
}
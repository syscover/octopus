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

class Order extends Model {

    use ModelTrait;

	protected $table        = '008_079_order';
    protected $primaryKey   = 'id_079';
    public $timestamps      = false;
    protected $fillable     = ['id_079', 'order_079', 'committed_079', 'supervisor_079', 'customer_079', 'shop_079', 'company_079', 'family_079', 'brand_079', 'product_079', 'laboratory_079', 'id_address_079', 'company_name_079', 'name_079', 'surname_079', 'country_079', 'territorial_area_1_079', 'territorial_area_2_079', 'territorial_area_3_072', 'cp_079', 'locality_079', 'address_079', 'phone_079', 'email_079', 'observations_079', 'date_079', 'view_height_079', 'view_width_079', 'total_height_079', 'total_width_079', 'units_079', 'expiration_079', 'attached_079', 'comments_079'];
    private static $rules   = [
        'shopid'        => 'required',
        'companyName'   => 'required|between:2,100',
        'name'          => 'required|between:2,50',
        'surname'       => 'required|between:2,50',
        'country'       => 'not_in:null',
        'cp'            => 'between:0,10',
        'locality'      => 'between:0,100',
        'address'       => 'required|between:0,150',
        'phone'         => 'between:0,50',
        'email'         => 'email|between:0,100',
        'viewWidth'     => 'required|numeric',
        'viewHeight'    => 'required|numeric',
        'units'         => 'required|numeric',
        'date'          => 'required'
    ];

    public static function validate($data)
    {
        return Validator::make($data, static::$rules);
	}

    public static function getCustomRecordsLimit()
    {
        return Order::join('008_075_customer', '008_079_order.customer_079', '=', '008_075_customer.id_075')
            ->join('008_076_shop', '008_079_order.shop_079', '=', '008_076_shop.id_076')
            ->join('008_072_product', '008_079_order.product_079', '=', '008_072_product.id_072')
            ->newQuery();
    }

    public static function getCustomRecord($parameters)
    {
        return Order::join('008_075_customer', '008_079_order.customer_079', '=', '008_075_customer.id_075')
            ->join('008_076_shop', '008_079_order.shop_079', '=', '008_076_shop.id_076')
            ->join('008_072_product', '008_079_order.product_079', '=', '008_072_product.id_072')
            ->leftJoin('008_077_address', '008_079_order.id_address_079', '=', '008_077_address.id_077')
            ->find($parameters['id']);
    }
}
<?php namespace Syscover\Octopus\Models;

use Syscover\Pulsar\Core\Model;
use Sofa\Eloquence\Eloquence;
use Sofa\Eloquence\Mappable;
use Illuminate\Support\Facades\Validator;

/**
 * Class Order
 *
 * Model with properties
 * <br><b>[id, request, stock, supervisor, customer, shop, company, family, brand, product, laboratory, id_address, company_name, name, surname, country, territorial_area_1, territorial_area_2, territorial_area_3_072, cp, locality, address, phone, email, observations, date, date_text, view_height, view_width, total_height, total_width, units, expiration, expiration_text, attachment, comments]</b>
 *
 * @package Syscover\Octopus\Models
 */

class Order extends Model
{
    use Eloquence, Mappable;

	protected $table        = '008_079_order';
    protected $primaryKey   = 'id_079';
    protected $suffix       = '079';
    public $timestamps      = false;
    protected $fillable     = ['id_079', 'request_079', 'stock_079', 'supervisor_079', 'customer_079', 'shop_079', 'company_079', 'family_079', 'brand_079', 'product_079', 'laboratory_079', 'id_address_079', 'company_name_079', 'name_079', 'surname_079', 'country_079', 'territorial_area_1_079', 'territorial_area_2_079', 'territorial_area_3_072', 'cp_079', 'locality_079', 'address_079', 'phone_079', 'email_079', 'observations_079', 'date_079', 'date_text_079', 'view_height_079', 'view_width_079', 'total_height_079', 'total_width_079', 'units_079', 'expiration_079', 'expiration_text_079', 'attachment_079', 'comments_079'];
    protected $maps         = [];
    protected $relationMaps = [];
    private static $rules   = [
        'shopId'        => 'required',
        'companyName'   => 'between:2,255',
        'name'          => 'between:2,255',
        'surname'       => 'between:2,255',
        'country'       => 'not_in:null',
        'cp'            => 'between:0,255',
        'locality'      => 'between:0,255',
        'address'       => 'required|between:0,255',
        'phone'         => 'between:0,255',
        'email'         => 'email|between:0,255',
        'viewWidth'     => 'required|numeric',
        'viewHeight'    => 'required|numeric',
        'units'         => 'required|numeric',
        'date'          => 'required'
    ];

    public static function validate($data)
    {
        return Validator::make($data, static::$rules);
	}

    public function scopeBuilder($query)
    {
        return $query->join('008_075_customer', '008_079_order.customer_079', '=', '008_075_customer.id_075')
            ->join('008_076_shop', '008_079_order.shop_079', '=', '008_076_shop.id_076')
            ->join('008_072_product', '008_079_order.product_079', '=', '008_072_product.id_072')
            ->leftJoin('008_077_address', '008_079_order.id_address_079', '=', '008_077_address.id_077');
    }

    public function addToGetIndexRecords($request, $parameters)
    {
        // get actions to know where it comes from the request
        $actions = $request->route()->getAction();

        $query =  $this->builder();

        // filter requests only from current user
        if($actions['resource'] === 'octopus-laboratory-order')
            $query->whereNull('stock_079');

        return $query;
    }

    public function customCount($request, $parameters)
    {
        // get actions to know where it comes from the request
        $actions = $request->route()->getAction();

        $query =  $this->builder();

        if($actions['resource'] === 'octopus-laboratory-order')
            $query->whereNull('stock_079');

        return $query;
    }
}
<?php namespace Syscover\Octopus\Models;

use Syscover\Pulsar\Core\Model;
use Sofa\Eloquence\Eloquence;
use Sofa\Eloquence\Mappable;
use Illuminate\Support\Facades\Validator;

/**
 * Class Order
 *
 * Model with properties
 * <br><b>[id, request_id, stock_id, supervisor_id, customer_id, shop_id, company_id, family_id, brand_id, product_id, laboratory, address_id, company_name, name, surname, country_id, territorial_area_1_id, territorial_area_2_id, territorial_area_3_id, cp, locality, address, phone, email, observations, date, date_text, view_height, view_width, total_height, total_width, units, expiration, expiration_text, attachment, comments]</b>
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
    protected $fillable     = ['id_079', 'request_id_079', 'stock_id_079', 'supervisor_id_079', 'customer_id_079', 'shop_id_079', 'company_id_079', 'family_id_079', 'brand_id_079', 'product_id_079', 'laboratory_id_079', 'address_id_079', 'company_name_079', 'name_079', 'surname_079', 'country_id_079', 'territorial_area_1_id_079', 'territorial_area_2_id_079', 'territorial_area_3_id_079', 'cp_079', 'locality_079', 'address_079', 'phone_079', 'email_079', 'observations_079', 'date_079', 'date_text_079', 'view_height_079', 'view_width_079', 'total_height_079', 'total_width_079', 'units_079', 'expiration_079', 'expiration_text_079', 'attachment_079', 'comments_079'];
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
        return $query->join('008_075_customer', '008_079_order.customer_id_079', '=', '008_075_customer.id_075')
            ->join('001_010_user', '008_079_order.supervisor_id_079', '=', '001_010_user.id_010')
            ->join('008_076_shop', '008_079_order.shop_id_079', '=', '008_076_shop.id_076')
            ->join('008_077_address', '008_079_order.address_id_079', '=', '008_077_address.id_077')
            ->join('008_072_product', '008_079_order.product_id_079', '=', '008_072_product.id_072')
            ->join('008_071_brand', '008_079_order.brand_id_079', '=', '008_071_brand.id_071')
            ->join('008_070_family', '008_079_order.family_id_079', '=', '008_070_family.id_070')
            ->join('008_074_company', '008_079_order.company_id_079', '=', '008_074_company.id_074');
    }

    public function addToGetIndexRecords($request, $parameters)
    {
        // get actions to know where it comes from the request
        $actions = $request->route()->getAction();

        $query =  $this->builder();

        // filter order for laboratory, that has not stock
        //if($actions['resource'] === 'octopus-laboratory-order')
        //    $query->whereNull('stock_id_079');

        return $query;
    }

    public function customCount($request, $parameters)
    {
        // get actions to know where it comes from the request
        $actions = $request->route()->getAction();

        $query =  $this->builder();

        // filter order for laboratory, that has not stock
        //if($actions['resource'] === 'octopus-laboratory-order')
        //    $query->whereNull('stock_id_079');

        return $query;
    }
}
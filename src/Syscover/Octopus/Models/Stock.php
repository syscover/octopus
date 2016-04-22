<?php namespace Syscover\Octopus\Models;

use Syscover\Pulsar\Core\Model;
use Sofa\Eloquence\Eloquence;
use Sofa\Eloquence\Mappable;
use Illuminate\Support\Facades\Validator;

/**
 * Class Stock
 *
 * Model with properties
 * <br><b>[id, request, order, supervisor, customer, shop, company, family, brand, product, laboratory, id_address, company_name, name, surname, country, territorial_area_1, territorial_area_2, territorial_area_3_072, cp, locality, address, phone, email, observations, date, date_text, view_height, view_width, total_height, total_width, units, expiration, expiration_text, attachment, comments]</b>
 *
 * @package Syscover\Octopus\Models
 */

class Stock extends Model
{
    use Eloquence, Mappable;

	protected $table        = '008_080_stock';
    protected $primaryKey   = 'id_080';
    protected $suffix       = '080';
    public $timestamps      = false;
    protected $fillable     = ['id_080', 'request_080', 'order_080', 'supervisor_080', 'customer_080', 'shop_080', 'company_080', 'family_080', 'brand_080', 'product_080', 'laboratory_080', 'id_address_080', 'company_name_080', 'name_080', 'surname_080', 'country_080', 'territorial_area_1_080', 'territorial_area_2_080', 'territorial_area_3_072', 'cp_080', 'locality_080', 'address_080', 'phone_080', 'email_080', 'observations_080', 'date_080', 'date_text_080', 'view_height_080', 'view_width_080', 'total_height_080', 'total_width_080', 'units_080', 'expiration_080', 'expiration_text_080', 'attachment_080', 'comments_080'];
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
        return $query->join('008_075_customer', '008_080_stock.customer_080', '=', '008_075_customer.id_075')
            ->join('008_076_shop', '008_080_stock.shop_080', '=', '008_076_shop.id_076')
            ->join('008_072_product', '008_080_stock.product_080', '=', '008_072_product.id_072')
            ->leftJoin('008_077_address', '008_080_stock.id_address_080', '=', '008_077_address.id_077');
    }

    public function addToGetIndexRecords($request, $parameters)
    {
        // get actions to know where it comes from the request
        $actions = $request->route()->getAction();

        $query =  $this->builder();

        // filter requests only from current user
        if($actions['resource'] === 'octopus-supervisor-stock')
            $query->where('supervisor_080', auth('pulsar')->user()->id_010);

        return $query;
    }

    public function customCount($request, $parameters)
    {
        // get actions to know where it comes from the request
        $actions = $request->route()->getAction();

        $query =  $this->builder();

        if($actions['resource'] === 'octopus-supervisor-stock')
            $query->where('supervisor_080', auth('pulsar')->user()->id_010);

        return $query;
    }
}
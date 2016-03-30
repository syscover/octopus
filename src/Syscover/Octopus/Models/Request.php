<?php namespace Syscover\Octopus\Models;

use Syscover\Pulsar\Models\Model;
use Illuminate\Support\Facades\Validator;
use Syscover\Pulsar\Traits\TraitModel;
use Sofa\Eloquence\Eloquence;
use Sofa\Eloquence\Mappable;

/**
 * Class Request
 *
 * Model with properties
 * <br><b>[id, order, committed, supervisor, customer, shop, company, family, brand, product, id_address, company_name, name, surname, country, territorial_area_1, territorial_area_2, territorial_area_3_072, cp, locality, address, phone, email, observations, date, view_height, view_width, total_height, total_width, units, expiration, attachment, comments]</b>
 *
 * @package Syscover\Octopus\Models
 */

class Request extends Model {

    use TraitModel;
    use Eloquence, Mappable;

	protected $table        = '008_078_request';
    protected $primaryKey   = 'id_078';
    protected $suffix       = '078';
    public $timestamps      = false;
    protected $fillable     = ['id_078', 'order_078', 'committed_078', 'supervisor_078', 'customer_078', 'shop_078', 'company_078', 'family_078', 'brand_078', 'product_078', 'id_address_078', 'company_name_078', 'name_078', 'surname_078', 'country_078', 'territorial_area_1_078', 'territorial_area_2_078', 'territorial_area_3_072', 'cp_078', 'locality_078', 'address_078', 'phone_078', 'email_078', 'observations_078', 'date_078', 'date_text_078', 'view_height_078', 'view_width_078', 'total_height_078', 'total_width_078', 'units_078', 'expiration_078', 'expiration_text_078', 'attachment_078', 'comments_078'];
    protected $maps         = [];
    protected $relationMaps = [];
    private static $rules   = [
        'shopId'        => 'required',
        'companyName'   => 'between:2,255',
        'name'          => 'between:2,255',
        'surname'       => 'between:2,255',
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

    public function scopeBuilder($query)
    {
        return $query->join('008_075_customer', '008_078_request.customer_078', '=', '008_075_customer.id_075')
            ->join('008_076_shop', '008_078_request.shop_078', '=', '008_076_shop.id_076')
            ->join('008_072_product', '008_078_request.product_078', '=', '008_072_product.id_072')
            ->leftJoin('008_077_address', '008_078_request.id_address_078', '=', '008_077_address.id_077');
    }
}
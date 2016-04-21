<?php namespace Syscover\Octopus\Models;

use Syscover\Pulsar\Core\Model;
use Sofa\Eloquence\Eloquence;
use Sofa\Eloquence\Mappable;
use Illuminate\Support\Facades\Validator;

/**
 * Class Request
 *
 * Model with properties
 * <br><b>[id, order, committed, supervisor, customer, shop, company, family, brand, product, id_address, company_name, name, surname, country, territorial_area_1, territorial_area_2, territorial_area_3_072, cp, locality, address, phone, email, observations, date, view_height, view_width, total_height, total_width, units, expiration, attachment, comments]</b>
 *
 * @package Syscover\Octopus\Models
 */

class Request extends Model
{
    use Eloquence, Mappable;

	protected $table        = '008_078_request';
    protected $primaryKey   = 'id_078';
    protected $suffix       = '078';
    public $timestamps      = false;
    protected $fillable     = ['id_078', 'order_078', 'stock_078', 'supervisor_078', 'customer_078', 'shop_078', 'company_078', 'family_078', 'brand_078', 'product_078', 'id_address_078', 'company_name_078', 'name_078', 'surname_078', 'country_078', 'territorial_area_1_078', 'territorial_area_2_078', 'territorial_area_3_072', 'cp_078', 'locality_078', 'address_078', 'phone_078', 'email_078', 'observations_078', 'date_078', 'date_text_078', 'view_height_078', 'view_width_078', 'total_height_078', 'total_width_078', 'units_078', 'expiration_078', 'expiration_text_078', 'attachment_078', 'comments_078'];
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
        return $query->join('008_075_customer', '008_078_request.customer_078', '=', '008_075_customer.id_075')
            ->join('008_074_company', '008_078_request.company_078', '=', '008_074_company.id_074')
            ->join('008_076_shop', '008_078_request.shop_078', '=', '008_076_shop.id_076')
            ->join('008_071_brand', '008_078_request.brand_078', '=', '008_071_brand.id_071')
            ->join('008_072_product', '008_078_request.product_078', '=', '008_072_product.id_072')
            ->join('008_070_family', '008_078_request.family_078', '=', '008_070_family.id_070')
            ->join('001_002_country', function ($join) {
                $join->on('008_078_request.country_078', '=', '001_002_country.id_002')
                    ->where('001_002_country.lang_002', '=', base_lang()->id_001);
            })
            ->leftJoin('001_003_territorial_area_1', '008_078_request.territorial_area_1_078', '=', '001_003_territorial_area_1.id_003')
            ->leftJoin('001_004_territorial_area_2', '008_078_request.territorial_area_2_078', '=', '001_004_territorial_area_2.id_004');
    }

    public function addToGetIndexRecords($request, $parameters)
    {
        // get actions to know where it comes from the request
        $actions = $request->route()->getAction();

        $query =  $this->builder();

        // filter requests only from current user
        if($actions['resource'] === 'octopus-supervisor-request')
            $query->where('supervisor_078', auth('pulsar')->user()->id_010);

        return $query;
    }

    public function customCount($request, $parameters)
    {
        // get actions to know where it comes from the request
        $actions = $request->route()->getAction();

        $query =  $this->builder();

        if($actions['resource'] === 'octopus-supervisor-request')
            $query->where('supervisor_078', auth('pulsar')->user()->id_010);

        return $query;
    }
}
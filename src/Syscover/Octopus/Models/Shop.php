<?php namespace Syscover\Octopus\Models;

use Syscover\Pulsar\Core\Model;
use Sofa\Eloquence\Eloquence;
use Sofa\Eloquence\Mappable;
use Illuminate\Support\Facades\Validator;

/**
 * Class Shop
 *
 * Model with properties
 * <br><b>[id, customer_id, name, country_id, territorial_area_1_id, territorial_area_2_id, territorial_area_3_id, cp, locality, address, contact, phone, email, web]</b>
 *
 * @package Syscover\Octopus\Models
 */

class Shop extends Model
{
    use Eloquence, Mappable;

	protected $table        = '008_076_shop';
    protected $primaryKey   = 'id_076';
    protected $suffix       = '076';
    public $timestamps      = false;
    protected $fillable     = ['id_076', 'customer_id_076', 'name_076', 'country_id_076', 'territorial_area_1_id_076', 'territorial_area_2_id_076', 'territorial_area_3_id_076', 'cp_076', 'locality_076', 'address_076', 'contact_076', 'phone_076', 'email_076', 'web_076'];
    protected $maps         = [];
    protected $relationMaps = [];
    private static $rules   = [
        'customerId'    => 'required',
        'name'          => 'required|between:2,255',
        'country'       => 'not_in:null',
        'cp'            => 'between:0,255',
        'locality'      => 'between:0,255',
        'address'       => 'required|between:0,255',
        'contact'       => 'between:0,255',
        'phone'         => 'between:0,255',
        'email'         => 'email|between:0,255',
        'web'           => 'between:0,255'
    ];

    public static function validate($data)
    {
        return Validator::make($data, static::$rules);
	}

    public function getAddresses()
    {
        return $this->hasMany('Syscover\Octopus\Models\Address','shop_id_077');
    }

    public function getFavoriteAddress()
    {
        return $this->hasMany('Syscover\Octopus\Models\Address','shop_id_077')->where('favorite_077', true);
    }

    public function getCustomer()
    {
        return $this->hasOne('Syscover\Octopus\Models\Customer','id_075','customer_id_076');
    }

    public function scopeBuilder($query)
    {
        return $query->join('008_075_customer', '008_076_shop.customer_id_076', '=', '008_075_customer.id_075')
            ->join('001_002_country', function ($join) {
                $join->on('008_076_shop.country_id_076', '=', '001_002_country.id_002')
                    ->where('001_002_country.lang_id_002', '=', base_lang()->id_001);
            })
            ->leftJoin('001_003_territorial_area_1', '008_076_shop.territorial_area_1_id_076', '=', '001_003_territorial_area_1.id_003')
            ->leftJoin('001_004_territorial_area_2', '008_076_shop.territorial_area_2_id_076', '=', '001_004_territorial_area_2.id_004');
    }
}
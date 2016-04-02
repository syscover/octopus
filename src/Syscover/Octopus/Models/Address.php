<?php namespace Syscover\Octopus\Models;

use Syscover\Pulsar\Models\Model;
use Illuminate\Support\Facades\Validator;
use Syscover\Pulsar\Traits\TraitModel;
use Sofa\Eloquence\Eloquence;
use Sofa\Eloquence\Mappable;

/**
 * Class Address
 *
 * Model with properties
 * <br><b>[id, name]</b>
 *
 * @package Syscover\Octopus\Models
 */

class Address extends Model {

    use TraitModel;
    use Eloquence, Mappable;

	protected $table        = '008_077_address';
    protected $primaryKey   = 'id_077';
    protected $suffix       = '077';
    public $timestamps      = false;
    protected $fillable     = ['id_077', 'shop_077', 'alias_077', 'company_name_077', 'name_077', 'surname_077', 'country_077', 'territorial_area_1_077', 'territorial_area_2_077', 'territorial_area_3_072', 'cp_077', 'locality_077', 'address_077', 'phone_077', 'email_077', 'favorite_077', 'latitude_077', 'longitude_077'];
    protected $maps         = [];
    protected $relationMaps = [];
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

    public function scopeBuilder($query)
    {
        return $query->join('001_002_country', function ($join) {
            $join->on('008_077_address.country_077', '=', '001_002_country.id_002')
                ->where('001_002_country.lang_002', '=', base_lang()->id_001);
            })
            ->leftJoin('001_003_territorial_area_1', '008_077_address.territorial_area_1_077', '=', '001_003_territorial_area_1.id_003')
            ->leftJoin('001_004_territorial_area_2', '008_077_address.territorial_area_2_077', '=', '001_004_territorial_area_2.id_004');
    }

    public function addToGetIndexRecords($request, $parameters)
    {
        return $this->where('shop_077', $parameters['ref']);
    }

    public function customCount($request, $parameters)
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
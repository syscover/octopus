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

class Product extends Model {

    use TraitModel;

	protected $table        = '008_072_product';
    protected $primaryKey   = 'id_072';
    public $timestamps      = false;
    protected $fillable     = ['id_072', 'brand_072', 'name_072'];
    private static $rules   = [
        'name'  => 'required|between:2,50',
        'brand' => 'not_in:null',
    ];

    public static function validate($data)
    {
        return Validator::make($data, static::$rules);
	}

    public static function addToGetRecordsLimit()
    {
        return Product::join('008_071_brand', '008_072_product.brand_072', '=', '008_071_brand.id_071')->newQuery();
    }

    public static function getBrandProducts($brand)
    {
        return Product::where('brand_072', $brand)->get();
    }
}
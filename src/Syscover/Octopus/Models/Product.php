<?php namespace Syscover\Octopus\Models;

use Syscover\Pulsar\Models\Model;
use Illuminate\Support\Facades\Validator;
use Syscover\Pulsar\Traits\TraitModel;
use Sofa\Eloquence\Eloquence;
use Sofa\Eloquence\Mappable;

/**
 * Class Product
 *
 * Model with properties
 * <br><b>[id, brand, name]</b>
 *
 * @package Syscover\Octopus\Models
 */

class Product extends Model {

    use TraitModel;
    use Eloquence, Mappable;

	protected $table        = '008_072_product';
    protected $primaryKey   = 'id_072';
    protected $suffix       = '072';
    public $timestamps      = false;
    protected $fillable     = ['id_072', 'brand_072', 'name_072'];
    protected $maps         = [];
    protected $relationMaps = [];
    private static $rules   = [
        'name'  => 'required|between:2,50',
        'brand' => 'not_in:null',
    ];

    public static function validate($data)
    {
        return Validator::make($data, static::$rules);
	}

    public function scopeBuilder($query)
    {
        return $query->join('008_071_brand', '008_072_product.brand_072', '=', '008_071_brand.id_071');
    }
}
<?php namespace Syscover\Octopus\Models;

use Syscover\Pulsar\Models\Model;
use Illuminate\Support\Facades\Validator;
use Syscover\Pulsar\Traits\TraitModel;
use Sofa\Eloquence\Eloquence;
use Sofa\Eloquence\Mappable;

/**
 * Class Family
 *
 * Model with properties
 * <br><b>[id, name]</b>
 *
 * @package Syscover\Octopus\Models
 */

class Brand extends Model {

    use TraitModel;
    use Eloquence, Mappable;

	protected $table        = '008_071_brand';
    protected $primaryKey   = 'id_071';
    protected $suffix       = '071';
    public $timestamps      = false;
    protected $fillable     = ['id_071', 'name_071'];
    protected $maps         = [];
    protected $relationMaps = [];
    private static $rules   = [
        'name'  => 'required|between:2,50'
    ];

    public static function validate($data)
    {
        return Validator::make($data, static::$rules);
	}
}
<?php namespace Syscover\Octopus\Models;

use Syscover\Pulsar\Core\Model;
use Sofa\Eloquence\Eloquence;
use Sofa\Eloquence\Mappable;
use Illuminate\Support\Facades\Validator;

/**
 * Class Family
 *
 * Model with properties
 * <br><b>[id, name]</b>
 *
 * @package Syscover\Octopus\Models
 */

class Brand extends Model
{
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
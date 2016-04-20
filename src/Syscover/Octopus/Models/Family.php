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

class Family extends Model
{
    use Eloquence, Mappable;

	protected $table        = '008_070_family';
    protected $primaryKey   = 'id_070';
    protected $suffix       = '070';
    public $timestamps      = false;
    protected $fillable     = ['id_070', 'name_070'];
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
<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class CarNumber
 *
 * @package App
 * @property string $number
 * @property string $car_model
*/
class CarNumber extends Model
{
    use SoftDeletes;

    protected $fillable = ['number', 'car_model_id'];
    

    /**
     * Set to null if empty
     * @param $input
     */
    public function setCarModelIdAttribute($input)
    {
        $this->attributes['car_model_id'] = $input ? $input : null;
    }
    
    public function car_model()
    {
        return $this->belongsTo(CarModel::class, 'car_model_id')->withTrashed();
    }
    
}

<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class CarModel
 *
 * @package App
 * @property string $description
 * @property string $motor
 * @property string $car_brand
*/
class CarModel extends Model
{
    use SoftDeletes;

    protected $fillable = ['description', 'motor', 'car_brand_id'];
    

    /**
     * Set to null if empty
     * @param $input
     */
    public function setCarBrandIdAttribute($input)
    {
        $this->attributes['car_brand_id'] = $input ? $input : null;
    }
    
    public function car_brand()
    {
        return $this->belongsTo(CarBrand::class, 'car_brand_id')->withTrashed();
    }
    
    public function tires()
    {
        return $this->belongsToMany(Tire::class, 'car_model_tire')->withTrashed();
    }
    
    public function carNumber() {
        return $this->hasMany(CarNumber::class, 'car_model_id');
    }
}

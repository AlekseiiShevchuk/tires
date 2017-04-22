<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class CarBrand
 *
 * @package App
 * @property string $name
*/
class CarBrand extends Model
{
    use SoftDeletes;

    protected $fillable = ['name'];
    
    
    public function carModel() {
        return $this->hasMany(CarModel::class, 'car_brand_id');
    }
}

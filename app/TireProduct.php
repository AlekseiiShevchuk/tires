<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class TireProduct
 *
 * @package App
 * @property string $name
 * @property string $brand
 * @property string $size
 * @property text $description
 * @property double $price
 * @property double $special_price
 * @property string $image_1
 * @property string $image_2
 * @property string $image_3
 * @property string $image_4
 * @property string $image_5
 * @property string $image_6
*/
class TireProduct extends Model
{
    protected $fillable = ['name', 'description', 'price', 'special_price', 'image_1', 'image_2', 'image_3', 'image_4', 'image_5', 'image_6', 'brand_id', 'size_id'];
    

    /**
     * Set to null if empty
     * @param $input
     */
    public function setBrandIdAttribute($input)
    {
        $this->attributes['brand_id'] = $input ? $input : null;
    }

    /**
     * Set to null if empty
     * @param $input
     */
    public function setSizeIdAttribute($input)
    {
        $this->attributes['size_id'] = $input ? $input : null;
    }

    /**
     * Set attribute to date format
     * @param $input
     */
    public function setPriceAttribute($input)
    {
        if ($input != '') {
            $this->attributes['price'] = $input;
        } else {
            $this->attributes['price'] = null;
        }
    }

    /**
     * Set attribute to date format
     * @param $input
     */
    public function setSpecialPriceAttribute($input)
    {
        if ($input != '') {
            $this->attributes['special_price'] = $input;
        } else {
            $this->attributes['special_price'] = null;
        }
    }
    
    public function brand()
    {
        return $this->belongsTo(TireBrand::class, 'brand_id');
    }
    
    public function size()
    {
        return $this->belongsTo(TireSize::class, 'size_id');
    }
    
}

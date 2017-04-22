<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Tire
 *
 * @package App
 * @property string $description
*/
class Tire extends Model
{
    use SoftDeletes;

    protected $fillable = ['description'];
    
    
}

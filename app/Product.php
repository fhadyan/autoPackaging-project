<?php 

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'products';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['product_name', 'weight', 'length', 'widht', 'height'];

    public function orders(){
        return $this->belongsToMany('App/Order');
    }

}

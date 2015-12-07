<?php 

namespace App;

use Illuminate\Database\Eloquent\Model;

class Box extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'boxes';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['width', 'length', 'height', 'std'];

}

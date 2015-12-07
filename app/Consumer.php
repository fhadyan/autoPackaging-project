<?php 

namespace App;

use Illuminate\Database\Eloquent\Model;

class Consumer extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'consumers';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'email', 'address', 'nohp'];

    public function orders(){
        return $this->hasMany('App/Order');
    }

}

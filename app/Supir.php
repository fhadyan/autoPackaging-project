<?php 

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supir extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'supirs';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'address', 'nohp'];

    public function letter(){
        return $this->hasOne('App\Letter');
    }

}

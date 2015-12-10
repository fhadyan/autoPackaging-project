<?php 

namespace App;

use Illuminate\Database\Eloquent\Model;

class Packaging extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'packagings';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['no_do', 'no_packaging','no_contract', 'invoice', 'invoice_date'];

    public function letter(){
        return $this->hasOne('App\Letter');
    }

    public function kolis(){
        return $this->hasMany('App\Koli');
    }

}

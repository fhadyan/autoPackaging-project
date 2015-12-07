<?php 

namespace App;

use Illuminate\Database\Eloquent\Model;

class Letter extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'letters';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['date', 'note', 'order_id', 'supir_id', 'packaging_id'];

    public function order(){
        return $this->belongsTo('App/Order');
    }

    public function packaging(){
        return $this->belongsTo('App/Packaging')
    }

    public function supir(){
        return $this->belongsTo('App/Supir');
    }

}

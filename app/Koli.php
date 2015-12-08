<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Koli extends Model
{
    //

    protected $table='kolis';

    protected $filable=['packaging_id', 'box_id'];

    public function packaging(){
    	return $this->belongsTo('App/Packaging');
    }

    public function box(){
    	return $this->belongsTo('App/Box')
    }

    public function products(){
        return $this->belongsToMany('App/Product');
    }
}

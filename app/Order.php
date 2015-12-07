<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';

    protected $fillable = ['date','user_id','consumer_id'];

    public function user(){
    	return $this->belongsTo('App/User');
    }

    public function consumer(){
    	return $this->belongsTo('App/Consumer');
    }

    public function products(){
    	return $this->belongToMany('App/Product');
    }

    public function letter(){
    	return $this->hasOne('App/Letter');
    }

    public function kolis(){
        return $this->hasMany('App/Koli');
    }
}

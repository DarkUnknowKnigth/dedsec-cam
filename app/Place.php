<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    protected $fillable=[
        'address',
        'latitude',
        'longitude'
    ];
    public function crime(){
        return $this->belongsTo('App\Crime');
    }
    public function criminals(){
        return $this->belongsToMany('App\Criminals','criminal_place');
    }
}

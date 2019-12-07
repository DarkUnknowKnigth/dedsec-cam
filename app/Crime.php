<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Crime extends Model
{
    protected $fillable=[
        'date',
        'establishment',
        'gun',
        'vehicle',
        'type_id',
        'place_id',
        'scene_id',
        'imagePath'
    ];
    public function type(){
        return $this->belongsTo('App\Type');
    }
    public function places(){
        return $this->hasMany('App\Place');
    }
    public function scene(){
        return $this->hasOne('App\Scene');
    }
    public function suspect(){
        return $this->hasMany('App\Suspect');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Criminal extends Model
{
    protected $fillable=[
        'name',
        'place_id',
        'sex',
        'characteristics','imagePath'
    ];
    public function scene(){
        return $this->belongsTo('App\Scene');
    }
    public function places(){
        return $this->belongsToMany('App\Place','criminal_place');
    }
    public function type(){
        return $this->belongsTo('App\Type');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Scene extends Model
{
    protected $fillable=[
        'imagePath',
        'crime_id',
        'criminal_id'
    ];
    public function crime(){
        return $this->belongsTo('App\Crime');
    }
    public function criminal(){
        return $this->hasMany('App\Criminal');
    }
    public function dataset(){
        return $this->belogsTo('App\Dataset');
    }
}

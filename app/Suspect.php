<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Suspect extends Model
{
    protected $fillable=[
        'name',
        'job',
        'crime_id'
    ];
    public function crime(){
        return $this->belongsTo('App\Crime');
    }
}

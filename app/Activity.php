<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    protected $table = 'activities';
    protected $guarded = [];

    public function club(){
        return $this -> belongsTo('App\Club');
    }

    public function participants(){
        return $this -> belongsToMany('App\User','activity_participants');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Club extends Model
{
    protected $table = 'clubs';
    protected $guarded = [];

    public function members(){
        return $this -> belongsToMany('App\User','club_members');
    }

    public function admins(){
        return $this -> belongsToMany('App\User','club_admins');
    }

    public function activities(){
        return $this -> hasMany('App\Activity');
    }
}

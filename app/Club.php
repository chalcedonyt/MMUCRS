<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Club extends Model
{
    use SoftDeletes;
    protected $table = 'clubs';
    protected $guarded = [];
    protected $hidden = ['deleted_at'];
    
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

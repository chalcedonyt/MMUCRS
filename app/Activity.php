<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Activity extends Model
{
    use SoftDeletes;
    protected $table = 'activities';
    protected $guarded = [];
    protected $hidden = ['deleted_at'];

    public function club(){
        return $this -> belongsTo('App\Club');
    }

    public function participants(){
        return $this -> belongsToMany('App\User','activity_participants');
    }
}

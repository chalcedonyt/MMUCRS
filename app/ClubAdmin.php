<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ClubAdmin extends Model
{
    use SoftDeletes;
    protected $table = 'club_admins';
    protected $guarded = [];
    protected $hidden = ['deleted_at'];    
}

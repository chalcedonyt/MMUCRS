<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ClubMember extends Model
{
    use SoftDeletes;
    protected $table = 'club_members';
    protected $guarded = [];
    protected $hidden = ['deleted_at'];    
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ActivityParticipant extends Model
{
    use SoftDeletes;
    protected $table = 'activity_participants';
    protected $guarded = [];
    protected $hidden = ['deleted_at'];
}

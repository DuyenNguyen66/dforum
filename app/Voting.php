<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Voting extends Model
{
    protected $fillable = ['user_id', 'vote_type', 'object_id', 'vote'];
}

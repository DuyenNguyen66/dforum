<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $fillable = ['question_id', 'user_id', 'body'];

    protected $appends = ['created_date'];

    public function question()
    {
        return $this->belongsTo('App\Question');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    // Attributes
    public function getCreatedDateAttribute()
    {
        return $this->created_at->diffForHumans();
    }
}

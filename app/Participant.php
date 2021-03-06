<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Participant extends Model
{
    protected $fillable = ['event_id', 'user_id', 'participant'];

    public function event()
    {
        return $this->belongsTo(Event::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

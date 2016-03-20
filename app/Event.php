<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Event extends Model
{
    protected $fillable = [
        'name',
        'description',
        'official',
        'game_id',
        'started_at',
        'ended_at'
    ];

    protected $dates = ['started_at', 'ended_at'];

    public function setStartedAtAttribute($date)
    {
        $this->attributes['started_at'] = Carbon::parse($date);
    }

    public function setEndedAtAttribute($date)
    {
        $this->attributes['ended_at'] = Carbon::parse($date);
    }

    public function scopeFuture($query)
    {
        $query->where('started_at', '>', Carbon::now());
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function game()
    {
        return $this->belongsTo('App\Game');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function participants()
    {
        return $this->hasMany('App\Participant');
    }

    public function full_description()
    {
        return "Play " . $this->game->name . " with " . $this->user->name . " and other Langara eSports members";
    }

    public function going_users()
    {
        $users = [];

        foreach($this->participants as $participant) {
            if ($participant->participant == 1) {
                $users[] = $participant->user_id;
            }
        }

        return $users;
    }

    public function not_going_users()
    {
        $users = [];

        foreach($this->participants as $participant) {
            if ($participant->participant == 0) {
                $users[] = $participant->user_id;
            }
        }

        return $users;
    }

}

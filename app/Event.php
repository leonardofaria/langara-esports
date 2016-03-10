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

}

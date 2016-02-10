<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Event extends Model
{
    protected $fillable = [
        'name',
        'description',
        'game_id',
        'played_at',
    ];

    public function setPublishedAttribute($date)
    {
        $this->attributes['played_at'] = Carbon::parse($date);
    }

    public function scopeFuture($query)
    {
        $query->where('played_at', '>', Carbon::now());
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

}

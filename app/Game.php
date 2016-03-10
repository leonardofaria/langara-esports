<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    protected $fillable = [
        'name',
        'avatar',
        'cover'
    ];

    public function events()
    {
        return $this->hasMany('App\Event');
    }
}

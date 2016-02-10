<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function games()
    {
        return $this->belongsToMany('App\Game');
    }

    public function events()
    {
        return $this->hasMany('App\Event');
    }

    public function social_account()
    {
        return $this->hasOne('App\SocialAccount');
    }

    public function admin()
    {
        return $this->hasOne('App\Admin');
    }

    public function avatar()
    {
        if ($this->social_account()->first()->provider === 'facebook') {
            return "//graph.facebook.com/" . $this->social_account()->first()->provider_user_id . "/picture?type=square";
        }
    }

    public function isAdmin()
    {
        return $this->admin()->first();
    }
}

<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Session;

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

    public function participants()
    {
        return $this->hasMany('App\Participant');
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
        # TODO: add more providers here
        if ($this->social_account()->first()->provider === 'facebook') {
            return "//graph.facebook.com/" . $this->social_account()->first()->provider_user_id . "/picture?type=square&width=150&height=150";
        }
    }

    public function cover() {
        $url = "https://graph.facebook.com/" . $this->social_account()->first()->provider_user_id . "/?fields=cover&access_token=" . Session::get('token');

        $facebook = file_get_contents($url);
        $json = json_decode($facebook);
        // dd($json);

        // TODO: refactor this into different methods
        $offset = $json->cover->offset_y == 0 ? "center" : "-" . $json->cover->offset_y . "px";
        return "background-image: url(\"" . $json->cover->source . "\"); background-position: center center";
    }

    public function isAdmin()
    {
        if (count($this->admin()->first()) > 0) {
            return true;
        } else {
            return false;
        }
    }
}

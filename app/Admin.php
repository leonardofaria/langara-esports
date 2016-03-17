<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
# use Illuminate\Database\Eloquent\SoftDeletes;

class Admin extends Model
{
    protected $fillable = ['user_id'];

    # use SoftDeletes;
    # protected $dates = ['deleted_at'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

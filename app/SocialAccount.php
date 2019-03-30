<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SocialAccount extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id', 'provider_user_id', 'provider', 'access_token', 'nickname', 'name', 'email', 'avatar'];

    public function user() {
        return $this->belongsTo(User::class);
    }
}

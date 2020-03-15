<?php

namespace App\Domains\SocialGraph\Models;

use Illuminate\Database\Eloquent\Model;

class UserConnection extends Model
{
    protected $table = 'user_connections';

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
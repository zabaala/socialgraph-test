<?php

namespace App\Domains\SocialGraph\Models;

use Illuminate\Database\Eloquent\Model;

class UserCity extends Model
{
    protected $table = 'user_cities';

    protected $fillable = [
        'name', 'rate'
    ];
}
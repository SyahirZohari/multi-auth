<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Industry extends Authenticatable
{
    use Notifiable;

    protected $guard = 'industry';

    protected $fillable = [
        'name', 'email', 'password','contact',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    
}
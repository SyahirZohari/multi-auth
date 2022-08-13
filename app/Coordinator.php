<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Coordinator extends Authenticatable
{
    use Notifiable;

    protected $guard = 'coordinator';

    protected $fillable = [
        'name', 'email', 'password','contact',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
}
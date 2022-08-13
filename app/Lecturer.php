<?php

namespace App;
use App\Skill;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Lecturer extends Authenticatable
{
    use Notifiable;

    protected $guard = 'lecturer';

    protected $fillable = [
        'name', 'email', 'password','contact',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function skill()
    {
        return $this->belongsToMany(Skill::class,'endorse_skills');
    }
}

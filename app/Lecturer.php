<?php

namespace App;
use App\Skill;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\DB;

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

    public function skills()
    {
        return $this->belongsToMany(Skill::class,'endorse_skills');
    }

    public function endorse($skill_id)
    {
        return DB::table('endorse_skills')
        ->select('endorse_status')
        ->where('lecturer_id',$this->id)
        ->where('skill_id', $skill_id)
        ->first();
    }
}

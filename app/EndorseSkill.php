<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EndorseSkill extends Model
{
    public $table ='endorse_skills';

    protected $fillable = [
        'lecturer_id', 'skill_id', 'endorse_status',
    ];
}

<?php

namespace App;
use App\Resume;
use App\Lecturer;
use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    public $table ='skills';

    protected $fillable = [
        'name','desc',
    ];

    public function resume()
    {
        return $this->belongsTo(Resume::class,'resume_id');
    }

    public function lecturer()
    {
        return $this->belongsToMany(Lecturer::class,'endorse_skills');
    }

 
}

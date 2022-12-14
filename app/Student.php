<?php

namespace App;
use App\Resume;
use App\Position;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Student extends Authenticatable
{
    use Notifiable;

    protected $guard = 'student';

    public $table ='students';

    protected $fillable = [
        'name', 'email', 'password','contact',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function resume()
    {
        return $this->hasOne(Resume::class);
    }

    public function positions()
    {
        return $this->belongsToMany(Position::class,'applicants','student_id','position_id')
        ->withPivot(['status','martial_status','ic','address','email','day_of_birth','contact','id'])
        ->using(Applicant::class);
    }
}

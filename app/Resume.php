<?php

namespace App;
use App\Student;
use App\Skill;
use Illuminate\Database\Eloquent\Model;

class Resume extends Model
{
    public $table ='resumes';

    protected $fillable = [
        'name','about_me','experience','education','cpre_status','cgpa','student_id','image','cpre_doc'
    ];

    public function student()
    {
        return $this->belongsTo(Student::class,'student_id');
    }

    public function skill()
    {
    	return $this->hasMany(Skill::class);
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\Pivot;

class Applicant extends Pivot
{
    protected $table = "applicants";

    protected $fillable = [
         'address','contact','ic','martial_status','day_of_birth','email','status','position_id','student_id'
    ];

    public function position(){
        return $this->belongTo(Position::class,'position_id')
        ->withPivot(['status','martial_status','ic','address','email','day_of_birth']);
    }

    public function student(){
        return $this->belongTo(Student::class,'student_id')
        ->withPivot(['status','martial_status','ic','address','email','day_of_birth']);
    }
}

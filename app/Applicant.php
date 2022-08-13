<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Applicant extends Model
{
    protected $table = "applicants";

    protected $fillable = [
         'address','contact','ic','martial_status','day_of_birth','email','status','position_id','student_id'
    ];
}

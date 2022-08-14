<?php

namespace App;
use App\Industry;
use App\Company;
use App\Student;

use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    public $table ='positions';

    protected $fillable = [
        'position_name','position_desc','position_salary','position_department','industry_id','company_id'
    ];

    public function industry()
    {
        return $this->belongsTo(Industry::class);
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function students()
    {
        return $this->belongsToMany(Student::class,'applicants','position_id','student_id')
        ->withPivot(['status','martial_status','ic','address','email','day_of_birth','id','contact'])
        ->using(Applicant::class);
    }

}

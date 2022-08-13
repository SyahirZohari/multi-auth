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
    public function student()
    {
        return $this->belongsToMany(Student::class,'applicants')
        ->withPivot(['status','martial_status','ic','address','email','day_of_birth']);
    }
    
}

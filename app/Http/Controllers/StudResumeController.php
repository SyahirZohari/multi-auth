<?php

namespace App\Http\Controllers;

use App\Student;
use App\Resume;
use App\Skill;
use Illuminate\Http\Request;

class StudResumeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:lecturer');
    }

   
    public function index()
    {
        $studResume= Resume::with('student')
        ->get();
  
        return view('lecturers.studentResume',compact('studResume'));
    }

   

    
    public function show(Resume $studResume)
    {
       


        $skills= Skill::with('resume') //NAK KELUARKAN SKILL YANG TAK DIENDORSEKAN LAGI SAHAJA
        ->where ('resume_id',$studResume->id)// maybe tambah condition ker kalo dah di endorse
        ->get();

    
        return view('lecturers.studResumeShow',compact('studResume','skills'));

    }

    


    
    public function destroy(Resume $studResume)
    {
        $studResume->delete();

       return redirect()->route('lecturers.studentResume')
       ->with('success','Resume deleted successfully');
    }
}
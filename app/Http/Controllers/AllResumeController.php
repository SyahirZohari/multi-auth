<?php

namespace App\Http\Controllers;

use App\Student;
use App\Resume;
use App\Skill;
use App\Lecture;
use App\Lecturer;
use Illuminate\Http\Request;


class AllResumeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:industry');
       
    }

   
    public function index()
    {
        //$position = Position::all();
        $resume= Resume::with('student')
        ->get();
  
        return view('industrys.allResumeIndex',compact('resume'));
    }

    
    public function show(Resume $allResume)
    {

        $skills = Skill::with('lecturer')
        ->where ('resume_id',$allResume->id)
        ->get();
        

        return view('industrys.allResumeShow',compact('allResume','skills'));

    }
    
    public function destroy(Resume $resume)
    {
        $resume->delete();

       return redirect()->route('resumes.index')
       ->with('success','Resume deleted successfully');
    }
}
    
   

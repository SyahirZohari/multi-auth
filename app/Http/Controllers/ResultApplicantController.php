<?php

namespace App\Http\Controllers;

use App\Applicant;
use App\Position;
use App\Company;
use App\Industry;
use App\Student;
use Illuminate\Http\Request;

class ResultApplicantController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:student');
        
    }

   
    public function index()
    {
        $student = Student::find(auth()->user()->id);

        $position = Student::with('position')
        ->where ('id',$student->id)
        ->get();

    

        $applicant = Position::with('student')// error salah data nieee
        ->get();
  
        return view('students.resultApplicant',compact('applicant','student','position'));
    }

    public function show(Position $resultApplicant)
    { 

       
        //dd($resultApplicant); //dier keluarkan value job position 
        
        return view('students.showResult',compact('resultApplicant','student'));

    }

    
    public function edit(Position $resultApplicant)
    {
        return view('students.applicantEdit',compact('resultApplicant'));
    }

   
    public function update(Request $request, Position $position)// hanya copy paste je nie dari conttolrer lain tak tukar lagi
    {
        $request->validate([
            'position_name' => 'required',
            'position_desc' => 'required',
            'position_salary' => 'required',
        ]);
  
        $position->update($request->all());
  
        return redirect()->route('positions.index')
                        ->with('success','Position updated successfully');
    }

  

    

   
   
}
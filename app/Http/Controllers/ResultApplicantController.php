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

    public function show(Position $resultApplicant, Student $student)
    { 

       
        //dd($resultApplicant); //dier keluarkan value job position 
        
        return view('students.showResult',compact('resultApplicant','student'));

    }

    
    public function edit(Position $resultApplicant, Student $student)
    {
        return view('students.applicantEdit',compact('resultApplicant', 'student'));
    }

   
    public function update(Request $request, Applicant $resultApplicant)// hanya copy paste je nie dari conttolrer lain tak tukar lagi
    {
        $request->validate([
            'ic' => 'required',
            'address' => 'required',
            'day_of_birth' => 'required',
            'contact' => 'required',
            'martial_status' => 'required',
        ]);
  
        $resultApplicant->update($request->all());
  
        return redirect()->route('positions.index')
                        ->with('success','Position updated successfully');
    }

  

    

   
   
}
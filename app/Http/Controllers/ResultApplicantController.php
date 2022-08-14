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
        $applicants = Student::with('positions')->find(auth()->user()->id);

        return view('students.resultApplicant',compact('applicants'));
    }

    public function show(Position $resultApplicant, Student $student)
    {


        //dd($resultApplicant); //dier keluarkan value job position

        return view('students.showResult',compact('resultApplicant','student'));

    }

    public function edit(Position $resultApplicant, Student $student)
    {
        $resultApplicant = Applicant::where('position_id',$resultApplicant->id)->where('student_id',$student->id)->first();
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

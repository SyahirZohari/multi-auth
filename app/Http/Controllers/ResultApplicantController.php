<?php

namespace App\Http\Controllers;

use App\Applicant;
use App\Student;
use App\Position;
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

    public function show($Applicant_id)
    {
        $student = Student::whereHas('positions', function($q) use ($Applicant_id){
            $q->where('applicants.id', $Applicant_id);
        })->first();

        $position = Position::whereHas('students', function($q) use ($Applicant_id){
            $q->where('applicants.id', $Applicant_id);
        })->first();

        $applicant = Applicant::find($Applicant_id);

        return view('students.showResult',compact('applicant','student','position'));

    }

    public function edit($Applicant_id)
    {
        $applicant = Applicant::find($Applicant_id);

        return view('students.applicantEdit',compact('applicant'));
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

        return redirect()->route('positions.index')->with('success','Position updated successfully');
    }
}

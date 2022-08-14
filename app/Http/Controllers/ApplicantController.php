<?php

namespace App\Http\Controllers;

use App\Applicant;
use App\Position;
use App\Student;
use Illuminate\Http\Request;

class ApplicantController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:industry');
    }

    public function index()
    {
        $positions = Position::with('students')
        ->where ('industry_id',auth()->user()->id)
        ->get();

        return view('applicants.index',compact('positions'));
    }

    public function show(Applicant $applicant)
    {
        $applicant = Student::with('positions')->whereHas('positions', function($q) use ($applicant){
            $q->where('applicants.id', $applicant->id);
        })->first();

        return view('applicants.applyShow',compact('applicant')); //view page utk show ada error 404
    }

    public function edit(Applicant $applicant)
    {
        $applicant = Student::with('positions')->whereHas('positions', function($q) use ($applicant){
            $q->where('applicants.id', $applicant->id);
        })->first();

        return view('applicants.applyEdit',compact('applicant')); //view page utk update ada error 404
    }

    public function update(Request $request, Applicant $applicant)
    {
        $request->validate([
            'status' => 'required',
        ]);

        $applicant->update($request->all());
        return redirect()->route('applicants.index')->with('success','Applicantion is BLA BLA BLA');// KALO REJECTED MACAM MANA PULAK
    }
}

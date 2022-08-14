<?php

namespace App\Http\Controllers;

use App\Applicant;
use App\Position;
use App\Company;
use App\Industry;
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
        $student = Student::with('Position')
        ->get();

        //$applicant = Applicant::all(); ERRRRORR TAK KELUAR PON DATA DIAAA!!!!!!
        $position = Position::with('student')
        ->where ('industry_id',auth()->user()->id)
        ->get();


        return view('applicants.index',compact('position'));
    }



    public function show(Position $applicant, Student $student)
    {
        //dd($student);
        return view('applicants.applyShow',compact('applicant','student')); //view page utk show ada error 404

    }


    public function edit(Position $applicant,Student $student)
    {
        $applied = Applicant::where('position_id',$applicant->id)->where('student_id',$student->id)->first();
        // dd($applied);
        return view('applicants.applyEdit',compact('applicant','student','applied')); //view page utk update ada error 404
    }


    public function update(Request $request, Applicant $applicant)
    {
        $request->validate([
            'status' => 'required',
        ]);

        $applicant->update($request->all());

        return redirect()->route('applicants.index')
                        ->with('success','Applicantion is BLA BLA BLA');// KALO REJECTED MACAM MANA PULAK
    }


}

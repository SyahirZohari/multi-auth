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
        $position = Position::whereHas('students', function($q) use ($applicant){
            $q->where('applicants.id', $applicant->id);
        })->first();

        return view('applicants.applyShow',compact('applicant','position'));
    }

    public function edit(Applicant $applicant)
    {
        $position = Position::whereHas('students', function($q) use ($applicant){
            $q->where('applicants.id', $applicant->id);
        })->first();

        return view('applicants.applyEdit',compact('applicant','position'));
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

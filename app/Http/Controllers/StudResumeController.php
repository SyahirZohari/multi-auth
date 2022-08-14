<?php

namespace App\Http\Controllers;

use App\Student;
use App\Resume;
use App\Skill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

    public function show($studResumeId)
    {
        $studResume = Resume::find($studResumeId);
        $skills= Skill::with('resume') //NAK KELUARKAN SKILL YANG TAK DIENDORSEKAN LAGI SAHAJA
        ->where ('resume_id',$studResumeId)// maybe tambah condition ker kalo dah di endorse
        ->get();

        $endorsed = DB::table('endorse_skills')
        ->select('*')
        ->whereIn('skill_id', $skills->pluck('id')->toArray())
        ->get();

        $endorsedArray = array();
        foreach ($endorsed as $key => $endorsed_value) {
            $endorsedArray[$endorsed_value->skill_id]=$endorsed_value->endorse_status;
        }
        $endorsedIds = $endorsed->pluck('skill_id')->toArray();
        return view('lecturers.studResumeShow',compact('studResume','skills','endorsedIds','endorsedArray'));
    }

    public function destroy(Resume $studResume)
    {
        $studResume->delete();
        return redirect()->route('lecturers.studentResume')->with('success','Resume deleted successfully');
    }
}

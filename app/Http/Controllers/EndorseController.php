<?php

namespace App\Http\Controllers;

use App\Skill;
use App\Lecturer;
use App\Resume;
use App\EndorseSkill;
use Illuminate\Http\Request;

class EndorseController extends Controller
{

 
    public function __construct()
    {
        $this->middleware('auth:lecturer');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $skills= Skill::pluck('name','id');

        return view('lecturers.studResumeShow',compact('skills'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
            $endorse = new EndorseSkill;
            $endorse->endorse_status = $request->input('endorse_status');
            $endorse->lecturer_id = auth()->user()->id;
            $endorse->skill_id= $request->input('skill_id');
            $endorse->save();
           
            return redirect()->route('studResume.index')//MISING URI [URI: studResume/{studResume}].
                        ->with('success','Skill endorse successfully.');
        

    }

   
}
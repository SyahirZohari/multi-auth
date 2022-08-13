<?php

namespace App\Http\Controllers;

use App\Skill;
use App\Resume;
use Illuminate\Http\Request;

class SkillController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:student');
    }

    public function create()
    {
        $resumes = Resume::pluck('name','id');//NIE GUNA SEBAB TAK THU NAK AMBIK ID RESUME TU MACAM MANA

        return view('resumes.show',compact('resumes'));

    }

    public function store(Request $request)
    {
        
            $skills = new Skill;
            $skills->name = $request->input('name');
            $skills->desc = $request->input('desc');
            $skills->resume_id= $request->input('resume_id');//RASAAAA PART NIE KENA TUKAR KOT
            $skills->save();
           
            return redirect()->route('resumes.index')
                        ->with('success','Skill created successfully.');
        

    }

    

    public function index()
    {
        $skills = Skill::all();
        return view('skills.index', compact('skills'));
    }

   
}

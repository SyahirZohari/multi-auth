<?php

namespace App\Http\Controllers;

use App\Student;
use App\Resume;
use App\Skill;
use App\Lecture;
use App\Lecturer;
use Illuminate\Http\Request;


class ResumeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:student');
       
    }

   
    public function index()
    {
        //$position = Position::all();
        $resume= Resume::with('student')
        ->where ('student_id',auth()->user()->id)
        ->get();
  
        return view('resumes.index',compact('resume'));
    }

    
    public function create()
    {
        $student = Student::pluck('name','id');

        return view('resumes.create',compact('student'));

    }

   
    public function store(Request $request)
    {
       

        $request->validate([
            'image'=> 'required|mimes:jpg,png,jpeg|max:5048',
            'cpre_doc'=> 'mimes:doc,docx,pdf,xls,xlsx,ppt,pptx'
        ]);

        $newImageName = time() . '-'.$request->name.'.'.
        $request->image->extension();

        $request->image->move(public_path('images'),$newImageName);


    

        $file = $request->file('cpre_doc');
        $filename = $file->getClientOriginalName();
        $filename = time().'.'.$filename;

        $path = $file->storeAs('documents',$filename);

        Resume::create([
    		'student_id' => auth()->user()->id,
            'name' => $request->name,
    		'about_me' => $request->about_me,
            'experience' => $request->experience,
            'education' => $request->education,
            'cpre_status' => $request->cpre_status,
    		'cgpa' => $request->cgpa,
            'image' =>$newImageName,
            'cpre_doc' =>$path
            
    	]);
        
            
        return redirect()->route('resumes.index')
                        ->with('success','Resume created successfully.');
    }

    
    public function show(Resume $resume)
    {


       
       
        
        $skills = Skill::with('lecturer')
        ->where ('resume_id',$resume->id)
        ->get();
        

        return view('resumes.show',compact('resume','skills'));

    }

    
    public function edit(Resume $resume)
    {
        return view('resumes.edit',compact('resume'));
    }

   
    public function update(Request $request, Resume $resume)
    {
        $request->validate([
            'name' => 'required',
            'about_me' => 'required',
            'experience' => 'required',
            'education' => 'required',
            'cpre_status' => 'required',
            'cgpa' => 'required',
        ]);
  
        $resume->update($request->all());
  
        return redirect()->route('resumes.index')
                        ->with('success','Resume updated successfully');
    }

    
    public function destroy(Resume $resume)
    {
        $resume->delete();

       return redirect()->route('resumes.index')
       ->with('success','Resume deleted successfully');
    }

   
}
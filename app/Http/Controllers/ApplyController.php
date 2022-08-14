<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Position;
use App\Company;
use App\Applicant;
use App\Student;

use Illuminate\Http\Request;

class ApplyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:student');
    }

    public function index()
    {
        $applyPosition = Position::with('industry') //mungkin boleh tambah condition kot kat sni entah..
        ->get();

        $applicants = Student::with('positions')->find(Auth::id());
        $appliedIds = array();

        foreach ($applicants->positions as $key => $position) {
            $appliedIds[] = $position->id;
        }

        return view('students.applyJob',compact('applyPosition','appliedIds'));
    }

    public function show(Position $apply)
    {
        return view('students.applyShow',compact('apply'));
    }

    public function create(Position $apply)
    {
        $position = Position::pluck('position_name','id');
        $company = Company::pluck('name','id');
        return view('students.applyCreate',compact('position','company','apply'));
    }

    public function store(Request $request)
    {
        Applicant::create([
    		'student_id' => auth()->user()->id,
            'address' => $request->address,
    		'contact' => auth()->user()->contact,
            'email' => auth()->user()->email,
    		'day_of_birth'=> $request->day_of_birth,
            'position_id'=> $request->position_id,
            'martial_status'=> $request->martial_status,
            'ic'=> $request->ic,
            'status'=> $request->status,
            'position_id'=> $request->position_id, //NIE GUNA SEBAB TAK THU NAK AMBIK ID POSITION TU MACAM MANA

    	]);
        return redirect()->route('applys.index')->with('success','Applicants created successfully.');
    }

}

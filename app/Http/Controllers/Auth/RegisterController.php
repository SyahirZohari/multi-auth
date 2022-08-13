<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Student;
use App\Lecturer;
use App\Industry;
use App\Coordinator;
use App\Hod;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;
    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
        $this->middleware('guest:student');
        $this->middleware('guest:lecturer');
        $this->middleware('guest:industry');
        $this->middleware('guest:coordinator');
        $this->middleware('guest:hod');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    public function showStudentRegisterForm()
    {
        return view('auth.register', ['url' => 'student']);
    }
      
    public function showLecturerRegisterForm()
    {
        return view('auth.register', ['url' => 'lecturer']);
    }
     
    public function showIndustryRegisterForm()
    {
        return view('auth.register', ['url' => 'industry']);
    }
      
    public function showHodRegisterForm()
    {
        return view('auth.register', ['url' => 'hod']);
    }
    public function showCoordinatorRegisterForm()
    {
        return view('auth.register', ['url' => 'coordinator']);
    }

     

   
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'contact' => $data['contact'],
            'password' => Hash::make($data['password']),
        ]);
    }

   
    protected function createStudent(Request $request)
    {
        $this->validator($request->all())->validate();
        Student::create([
            'name' => $request->name,
            'email' => $request->email,
            'contact' => $request->contact,
            'password' => Hash::make($request->password),
        ]);
        return redirect()->intended('login/student');
    }
   
    protected function createLecturer(Request $request)
    {
        $this->validator($request->all())->validate();
        Lecturer::create([
            'name' => $request->name,
            'email' => $request->email,
            'contact' => $request->contact,
            'password' => Hash::make($request->password),
        ]);
        return redirect()->intended('login/lecturer');
    }
   
    protected function createIndustry(Request $request)
    {
        $this->validator($request->all())->validate();
        Industry::create([
            'name' => $request->name,
            'email' => $request->email,
            'contact' => $request->contact,
            'password' => Hash::make($request->password),
        ]);
        return redirect()->intended('login/industry');
    }
    
   
    protected function createCoordinator(Request $request)
    {
        $this->validator($request->all())->validate();
        Coordinator::create([
            'name' => $request->name,
            'email' => $request->email,
            'contact' => $request->contact,
            'password' => Hash::make($request->password),
        ]);
        return redirect()->intended('login/coordinator');
    }
    protected function createHod(Request $request)
    {
        $this->validator($request->all())->validate();
        Hod::create([
            'name' => $request->name,
            'email' => $request->email,
            'contact' => $request->contact,
            'password' => Hash::make($request->password),
        ]);
        return redirect()->intended('login/hod');
    }
}
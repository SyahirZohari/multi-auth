<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;



class LoginController extends Controller
{
    
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
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
            $this->middleware('guest')->except('logout');
            $this->middleware('guest:student')->except('logout');
            $this->middleware('guest:lecturer')->except('logout');
            $this->middleware('guest:industry')->except('logout');
            $this->middleware('guest:hod')->except('logout');
            $this->middleware('guest:coordinator')->except('logout');
    }

     
    public function showStudentLoginForm()
    {
        return view('auth.login', ['url' => 'student']);
    }

    public function studentLogin(Request $request)
    {
        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required|min:6'
        ]);

        if (Auth::guard('student')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {

            return redirect()->intended('/student');
        }
        return back()->withInput($request->only('email', 'remember'));
    }
    public function showLecturerLoginForm()
    {
        return view('auth.login', ['url' => 'lecturer']);
    }

    public function lecturerLogin(Request $request)
    {
        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required|min:6'
        ]);

        if (Auth::guard('lecturer')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {

            return redirect()->intended('/lecturer');
        }
        return back()->withInput($request->only('email', 'remember'));
    }
    public function showIndustryLoginForm()
    {
        return view('auth.login', ['url' => 'industry']);
    }

    public function industryLogin(Request $request)
    {
        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required|min:6'
        ]);

        if (Auth::guard('industry')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {

            return redirect()->intended('/industry');
        }
        return back()->withInput($request->only('email', 'remember'));
    }
    public function showHodLoginForm()
    {
        return view('auth.login', ['url' => 'hod']);
    }

    public function hodLogin(Request $request)
    {
        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required|min:6'
        ]);

        if (Auth::guard('hod')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {

            return redirect()->intended('/hod');
        }
        return back()->withInput($request->only('email', 'remember'));
    }
    public function showCoordinatorLoginForm()
    {
        return view('auth.login', ['url' => 'coordinator']);
    }

    public function coordinatorLogin(Request $request)
    {
        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required|min:6'
        ]);

        if (Auth::guard('coordinator')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {

            return redirect()->intended('/coordinator');
        }
        return back()->withInput($request->only('email', 'remember'));
    }

}
<?php

use App\Http\Controllers\ApplyController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::view('/', 'welcome');
Auth::routes();

/* Contoh route tutorial Laravel 7
Route::get('/login/admin', 'Auth\LoginController@showAdminLoginForm');
Route::get('/login/blogger', 'Auth\LoginController@showBloggerLoginForm');
Route::get('/register/admin', 'Auth\RegisterController@showAdminRegisterForm');
Route::get('/register/blogger', 'Auth\RegisterController@showBloggerRegisterForm');

Route::post('/login/admin', 'Auth\LoginController@adminLogin');
Route::post('/login/blogger', 'Auth\LoginController@bloggerLogin');
Route::post('/register/admin', 'Auth\RegisterController@createAdmin');
Route::post('/register/blogger', 'Auth\RegisterController@createBlogger');*/

Route::get('/login/student', 'Auth\LoginController@showStudentLoginForm')->name('login.student');
Route::get('/login/lecturer', 'Auth\LoginController@showLecturerLoginForm')->name('login.lecturer');
Route::get('/register/student', 'Auth\RegisterController@showStudentRegisterForm')->name('register.student');
Route::get('/register/lecturer', 'Auth\RegisterController@showLecturerRegisterForm')->name('register.lecturer');
Route::get('/login/industry', 'Auth\LoginController@showIndustryLoginForm')->name('login.industry');
Route::get('/login/hod', 'Auth\LoginController@showHodLoginForm');
Route::get('/register/industry', 'Auth\RegisterController@showIndustryRegisterForm')->name('register.industry');
Route::get('/register/hod', 'Auth\RegisterController@showHodRegisterForm');
Route::get('/login/coordinator', 'Auth\LoginController@showCoordinatorLoginForm');
Route::get('/register/coordinator', 'Auth\RegisterController@showCoordinatorRegisterForm');

Route::post('/login/student', 'Auth\LoginController@studentLogin');
Route::post('/login/lecturer', 'Auth\LoginController@lecturerLogin');
Route::post('/register/student', 'Auth\RegisterController@createStudent');
Route::post('/register/lecturer', 'Auth\RegisterController@createLecturer');
Route::post('/login/industry', 'Auth\LoginController@industryLogin');
Route::post('/login/hod', 'Auth\LoginController@hodLogin');
Route::post('/register/hod', 'Auth\RegisterController@createHod');
Route::post('/register/industry', 'Auth\RegisterController@createIndustry');
Route::post('/login/coordinator', 'Auth\LoginController@coordinatorLogin');
Route::post('/register/coordinator', 'Auth\RegisterController@createCoordinator');


Route::resource('companies','CompanyController');
Route::resource('positions','PositionController');
Route::resource('resumes','ResumeController');




Route::view('/home', 'home')->middleware('auth');

Route::group(['middleware' => 'auth:admin'], function () {
    Route::view('/admin', 'admin');
});

Route::group(['middleware' => 'auth:blogger'], function () {
    Route::view('/blogger', 'blogger');
});
Route::group(['middleware' => 'auth:student'], function () {
    Route::view('/student', 'student');
    Route::get('studentprofile', ['as' => 'studentprofile.edit', 'uses' => 'StudentProfileController@edit']);
	Route::put('studentprofile', ['as' => 'studentprofile.update', 'uses' => 'StudentProfileController@update']);
    //Route::resource('applys','ApplyController');


    Route::get('applys','ApplyController@index')->name('applys.index');
    Route::post('applys','ApplyController@store')->name('applys.store');
    Route::get('applys/create/{apply}','ApplyController@create')->name('applys.create');
    Route::get('applys/{apply}','ApplyController@show')->name('applys.show');
    Route::resource('skills','SkillController');
    Route::get('resultApplicants','ResultApplicantController@index')->name('resultApplicants.index');
    Route::get('resultApplicants/{resultApplicant}/{student}','ResultApplicantController@show')->name('resultApplicants.show');
    Route::put('resultApplicants/{resultApplicant}','ResultApplicantController@update')->name('resultApplicants.update');
    Route::get('resultApplicants/{resultApplicant}/{student}/edit','ResultApplicantController@edit')->name('resultApplicants.edit');
    //Route::resource('resultApplicants','ResultApplicantController');
    //Route::get('skills','SkillController@index')->name('skills.index');
    //Route::post('skills/{skill}','SkillController@store')->name('skills.store');
   });


Route::group(['middleware' => 'auth:lecturer'], function () {
    Route::view('/lecturer', 'lecturer');
    Route::get('lecturerprofile', ['as' => 'lecturerprofile.edit', 'uses' => 'LecturerProfileController@edit']);
	Route::put('lecturerprofile', ['as' => 'lecturerprofile.update', 'uses' => 'LecturerProfileController@update']);
    Route::resource('studResume','StudResumeController');
    Route::resource('allCompanies','AllCompanyController');
    Route::resource('endorse','EndorseController');


});

Route::group(['middleware' => 'auth:industry'], function () {
    Route::view('/industry', 'industry');
    Route::get('industryprofile', ['as' => 'industryprofile.edit', 'uses' => 'IndustryProfileController@edit']);
	Route::put('industryprofile', ['as' => 'industryprofile.update', 'uses' => 'IndustryProfileController@update']);
    Route::get('applicants','ApplicantController@index')->name('applicants.index');
    Route::get('applicants/{applicant}/{student}','ApplicantController@show')->name('applicants.show');
    Route::put('applicants/{applicant}','ApplicantController@update')->name('applicants.update');
    Route::get('applicants/{applicant}/{student}/edit','ApplicantController@edit')->name('applicants.edit');
    //Route::resource('applicants','ApplicantController');
    Route::resource('allResumes','AllResumeController');
});

Route::group(['middleware' => 'auth:hod'], function () {
    Route::view('/hod', 'hod');
});

Route::group(['middleware' => 'auth:coordinator'], function () {
    Route::view('/coordinator', 'coordinator');
});



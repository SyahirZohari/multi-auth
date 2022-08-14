<?php

namespace App\Http\Controllers;

use App\Student;
use App\Resume;
use App\Skill;
use App\Lecture;
use App\Lecturer;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use File;
use Response;
use DB;
use phpDocumentor\Reflection\File as ReflectionFile;

class DownloadCPREController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:student');
       
    }

  /**
 * download file
 * 
 * @param \Illuminate\Http\Request  $request
 *
 * @return \Illuminate\Auth\Access\Response
 */
    public function download($cpre_doc)
    {
    
        return response()->download(storage_path("app/documents/{$cpre_doc}"));
      
    }


   
}
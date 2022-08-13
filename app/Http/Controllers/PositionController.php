<?php

namespace App\Http\Controllers;

use App\Position;
use App\Company;
use App\Industry;
use Illuminate\Http\Request;

class PositionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:industry');
        
    }

   
    public function index()
    {
        //$position = Position::all();
        $position = Position::with('industry')
        ->where ('industry_id',auth()->user()->id)
        ->get();
  
        return view('positions.index',compact('position'));
    }

    
    public function create()
    {
        $company = Company::pluck('name','id');

        return view('positions.create',compact('company'));

    }

   
    public function store(Request $request)
    {
        Position::create([
    		'industry_id' => auth()->user()->id,
            'company_id' => $request->company_id,
            'position_name' => $request->position_name,
    		'position_desc' => $request->position_desc,
            'position_department' => $request->position_department,
    		'position_salary' => $request->position_salary,
    	]);
   
        return redirect()->route('positions.index')
                        ->with('success','Position created successfully.');
    }

    
    public function show(Position $position)
    {
        
        return view('positions.show',compact('position'));

    }

    
    public function edit(Position $position)
    {
        return view('positions.edit',compact('position'));
    }

   
    public function update(Request $request, Position $position)
    {
        $request->validate([
            'position_name' => 'required',
            'position_desc' => 'required',
            'position_salary' => 'required',
        ]);
  
        $position->update($request->all());
  
        return redirect()->route('positions.index')
                        ->with('success','Position updated successfully');
    }

    
    public function destroy(Position $position)
    {
        $position->delete();

       return redirect()->route('positions.index')
       ->with('success','Position deleted successfully');
    }
}
@extends('layouts.stud-template')
   
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Student Resume</h2>
            </div>
        </div>
    </div>
   
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
  
    <form action="{{ route('resumes.update',$resume->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="card">
         <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Name:</strong>
                    <input type="text" name="name" value="{{ $resume->name }}" class="form-control" placeholder="Name">
                </div>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                <strong>About Me:</strong>
                    <textarea class="form-control" style="height:150px" name="about_me" placeholder="About Me">{{ $resume->about_me }}</textarea>
                </div>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                <strong>Experience:</strong>
                    <textarea class="form-control" style="height:150px" name="experience" placeholder="Experience">{{ $resume->experience }}</textarea>
                </div>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                <strong>Education:</strong>
                    <textarea class="form-control" style="height:150px" name="education" placeholder="Education">{{ $resume->education }}</textarea>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>CPRE Status:</strong>
                <select class="form-control" name="cpre_status" value="{{ $resume->cpre_status }}">
                        <option value="Pass">Pass</option>
                        <option value="Fail">Fail</option>
                </select>
                </div>
            </div>
        
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>CGPA:</strong>
                    <input type="text" class="form-control" name="cgpa" value="{{ $resume->cgpa }}" placeholder="CGPA">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              <button type="submit" class="btn btn-primary">Submit</button>
                
            </div>
        </div>
        </div>
    </form>
@endsection
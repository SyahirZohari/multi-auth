@extends('layouts.stud-template')
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Create Resume</h2>
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
   
<form action="{{ route('resumes.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
  
     <div class="card">
    <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                <input type="text" name="name" class="form-control" placeholder="Name" required>
            </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Image:</strong>
            <input type="file" name="image" class="form-control" placeholder="Image" required>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
        <strong>About Me:</strong>
            <textarea class="form-control" style="height:150px" name="about_me" placeholder="About Me"></textarea>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
        <strong>Experience:</strong>
            <textarea class="form-control" style="height:150px" name="experience" placeholder="Experience"></textarea>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
        <strong>Education:</strong>
            <textarea class="form-control" style="height:150px" name="education" placeholder="education"></textarea>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>CPRE Status:</strong>
        <select class="form-control" name="cpre_status">
            <option value="">-- Choose CPRE Status --</option>
                <option value="Pass">Pass</option>
                <option value="Fail">Fail</option>
        </select>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>CPRE Document:</strong>
            <input type="file" name="cpre_doc" class="form-control" placeholder="CPRE Document" required>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>CGPA:</strong>
            <input type="text" name="cgpa" class="form-control" placeholder="CGPA" required>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
     </div>
</form>

@endsection
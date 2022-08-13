@extends('layouts.in-template')
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Add New Job Position</h2>
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
   
<form action="{{ route('positions.store') }}" method="POST">
    @csrf
  
     <div class="card">
    <div class="col-xs-6 col-sm-6 col-md-6">
            <div class="form-group">
                <strong>Job Position Name:</strong>
                <input type="text" name="position_name" class="form-control" placeholder="Name" required>
            </div>
    </div>
    <div class="col-xs-6 col-sm-6 col-md-6">
            <div class="form-group">
                <strong>Description:</strong>
                <input type="text" name="position_desc" class="form-control" placeholder="Description" required>
            </div>
    </div>
    <div class="col-xs-6 col-sm-6 col-md-6">
        <div class="form-group">
            <strong>Department:</strong>
            <input type="text" name="position_department" class="form-control" placeholder="Department" required>
        </div>
    </div>
    <div class="col-xs-6 col-sm-6 col-md-6">
        <div class="form-group">
            <strong>Salary:</strong>
            <input type="text" name="position_salary" class="form-control" placeholder="Salary" required>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-6 col-sm-6 col-md-6">
            <select class="form-control" name="company_id">
                <option value="">-- Choose Company --</option>
                @foreach ($company as $id => $name)
                    <option
                        value="{{$id}}" {{ (isset($position['company_id']) && $position['company_id'] == $id) ? ' selected' : '' }}>{{$name}}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
        
                <a class="btn btn-primary" href="{{ route('positions.index') }}"> Back</a>
        </div>
    </div>
     </div>
</form>

@endsection
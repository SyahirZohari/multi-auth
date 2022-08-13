@extends('layouts.stud-template')
   
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Student Applicant </h2>
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
  
    <form action="{{ route('resultApplicants.update',$resultApplicant->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="card">
         <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>IC:</strong>
                    <input type="text" name="ic" class="form-control" value="{{$resultApplicant->pivot->ic}}" required>
                </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
            <strong>Address:</strong>
                <textarea class="form-control" style="height:150px" name="address" > {{ $resultApplicant->pivot->address}}</textarea>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Marital Status:</strong>
            <select class="form-control" name="martial_status">
                <option value="">-- Choose Martial Status --</option>
                    <option value="Single">Single</option>
                    <option value="Married">Married</option>
            </select>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Day of Birth:</strong>
                <input type="date" name="day_of_birth" class="form-control" value="{{ $resultApplicant->pivot->day_of_birth}}">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Contact:</strong>
                <input type="text" name="contact" class="form-control" value="{{ $resultApplicant->pivot->contact}}" >
            </div>
        </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              <button type="submit" class="btn btn-primary">Submit</button>
                <a class="btn btn-primary" href="{{ route('resultApplicants.index') }}"> Back</a>
            </div>
        </div>
        </div>
    </form>
@endsection
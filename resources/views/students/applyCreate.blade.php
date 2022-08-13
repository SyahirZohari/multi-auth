@extends('layouts.stud-template')
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Apply Job Position</h2>
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
   
<form action="{{ route('applys.store') }}" method="POST">
    @csrf
    <input type="hidden" name="position_id" value="{{$apply->id}}" >
    <input type="hidden" name="status" value="Pending" >
     <div class="card">
    <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>IC:</strong>
                <input type="text" name="ic" class="form-control" placeholder="IC" required>
            </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
        <strong>Address:</strong>
            <textarea class="form-control" style="height:150px" name="address" placeholder="Address"></textarea>
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
            <input type="date" name="day_of_birth" class="form-control" placeholder="Day of Birth" required>
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
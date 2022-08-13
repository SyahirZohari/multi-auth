@extends('layouts.in-template')
@section('content')
<div class="container-fluid py-4">
    <div class="row">
      <div class="col-12">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Show Job Position Details</h2>
            </div>
        </div>
    </div>
   <div class="card">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Job Position Name:</strong>
                {{ $position->position_name }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Desription:</strong>
                {{ $position->position_desc }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Department:</strong>
                {{ $position->position_department }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Salary:</strong>
                {{ $position->position_salary }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Created By:</strong>
                {{ $position->industry->name }}
            </div>
        </div>
        <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('positions.index') }}"> Back</a>
        </div>
    </div>
   </div>
    </div>
</div>
@endsection
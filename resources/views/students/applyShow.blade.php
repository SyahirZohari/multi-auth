@extends('layouts.stud-template')
@section('content')
<div class="container-fluid py-4">
    <div class="row">
      <div class="col-12">
        <div class="card mb-4">
          <div class="card-header pb-0">
            <h1 class="h3 mb-2 text-gray-800">Job Position</h1>
          </div>
          <div class="card-body px-0 pt-0 pb-2">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Name:</strong>
                        {{ $apply->position_name }}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Desription:</strong>
                        {{ $apply->position_desc }}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Department:</strong>
                        {{ $apply->position_department }}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Salary:</strong>
                        {{ $apply->position_salary }}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Company Name:</strong>
                        {{ $apply->company->name }}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Created by:</strong>
                        {{ $apply->industry->name }}
                    </div>
                </div>
                <div class="pull-right">
                        <a class="btn btn-primary" href="{{ route('applys.index') }}"> Back</a>
                </div>
            </div>
        </div>
        </div>
      </div>
    </div>
</div>
@endsection
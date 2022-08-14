@extends('layouts.in-template')
@section('content')
<div class="container-fluid py-4">
    <div class="row">
      <div class="col-12">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Show Applicant Details</h2>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="row mt-3">
            <!-- Pivot Data IC, Address,day of birth, status-->
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>IC:</strong>
                    {{ $applicant->ic }}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Email:</strong>
                    {{ $applicant->email }}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Day Of Birth:</strong>
                    {{ $applicant->day_of_birth }}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Address:</strong>
                    {{ $applicant->address }}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Contact:</strong>
                    {{ $applicant->contact }}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Martial Status:</strong>
                    {{ $applicant->martial_status }}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Position Name:</strong>
                    {{ $position->position_name }}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Company Name:</strong>
                    {{ $position->company->name }}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Salary:</strong>
                    {{ $position->position_salary}}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Department:</strong>
                    {{ $position->position_department }}
                </div>
            </div>


        <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('applicants.index') }}"> Back</a>
        </div>
    </div>
   </div>
    </div>
</div>
@endsection

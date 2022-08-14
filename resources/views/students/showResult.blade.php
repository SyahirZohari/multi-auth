@extends('layouts.stud-template')
@section('content')
<div class="container-fluid py-4">
    <div class="row">
      <div class="col-12">
        <div class="card mb-4">
          <div class="card-header pb-0">
            <h1 class="h3 mb-2 text-gray-800">Show Student Applicant</h1>
          </div>
          <div class="card-body px-0 pt-0 pb-2">
            <div class="mt-2">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Name:</strong>
                        {{ $student->name }}
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
                        <strong>Email:</strong>
                        {{ $applicant->email }}
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
                        <strong>Salary:</strong>
                        {{ $position->position_salary }}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Company Name:</strong>
                        {{ $position->company->name}}
                    </div>
                </div>

                <!-- Pivot Data IC, Address,day of birth, status-->
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>IC:</strong>
                        {{ $applicant->ic }}
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
                        <strong>Status:</strong>
                        {{ $applicant->status}}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Day of Birth:</strong>
                        {{ $applicant->day_of_birth}}
                    </div>
                </div>
                <div class="col-2">
                    <a class="btn btn-primary" href="{{ route('resultApplicants.index') }}"> Back</a>
                </div>
            </div>
        </div>
        </div>
      </div>
    </div>
</div>
@endsection

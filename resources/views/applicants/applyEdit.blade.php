@extends('layouts.in-template')
@section('content')
<div class="container-fluid py-4">
    <div class="row">
      <div class="col-12">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Approve Applicant Details</h2>
            </div>
        </div>
    </div>
   <div class="card">
    <div class="row mt-3">
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
        <form action="{{ route('applicants.update',$applicant->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Status:</strong>
                    <select class="form-control" name="status">
                        <option value="">--Choose Status--</option>
                        <option value="Approved" @if ($applicant->status === 'Approved')
                            {{ ' selected' }}
                        @endif>Approved</option>
                        <option value="Rejected" @if ($applicant->status === 'Rejected')
                            {{ ' selected' }}
                        @endif>Rejected</option>
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>

        <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('applicants.index') }}"> Back</a>
        </div>
    </div>
   </div>
    </div>
</div>
@endsection

@extends('layouts.stud-template')
@section('content')
<div class="container-fluid py-4">
    <div class="row">
      <div class="col-12">
        <div class="card mb-4">
            <div class="container">
                <h2>Student Name: {{ $student->name }}</h2><hr>
                @foreach($student->position as $a)
                    <p>{{ $a->position_name }} ({{ $a->company->name }}) ({{ $a->pivot->status }}) ({{ $a->pivot->martial_status }})</p>
                @endforeach
            </div>
          <div class="card-header pb-0">
            <h1 class="h3 mb-2 text-gray-800">List of Position Applied:</h1>
          </div>
          <div class="card-body px-0 pt-0 pb-2">
            <div class="table-responsive p-0">
              <table class="table align-items-center mb-0">
            <div class="table-responsive">
                    <tr>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Email</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Contact</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Martial Status</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Job Name</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Company</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" width="280px">Action</th>
                    </tr>
                    <tbody>
                      @foreach($student->position as $a)
                    <tr>
                        <td class="text-xs font-weight-bold mb-0">{{ $a->id }}</td>
                        <td class="align-middle text-center text-sm">{{  $student->email  }}</td>
                        <td class="align-middle text-center">{{ $student->contact}}</td>
                        <td class="align-middle text-center">{{ $a->pivot->martial_status}}</td>
                        <td class="align-middle text-center">{{ $a->position_name}}</td>
                        <td class="align-middle text-center">{{ $a->company->name}}</td>
                        <td class="align-middle text-center">{{ $a->pivot->status }}</td>
                        <td class="text-secondary font-weight-bold text-xs">
                                <a class="btn btn-info" href="{{ route('resultApplicants.show',['resultApplicant'=>$a->id,'student'=>$student->id]) }}">Show</a>
                                <a class="btn btn-primary" href="{{ route('resultApplicants.edit',['resultApplicant'=>$a->id,'student'=>$student->id]) }}">Update</a>
   
                        </td>
                    </tr>
                    </tbody>
                    @endforeach
                </table>
            </div>
        </div> 
        </div>
      </div>
    </div>
</div>
@endsection
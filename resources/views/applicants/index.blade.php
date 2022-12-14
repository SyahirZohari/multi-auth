@extends('layouts.in-template')
@section('content')
<div class="container-fluid py-4">
    <div class="row">
      <div class="col-12">
        <div class="card mb-4">
          <div class="card-header pb-0">
            <h1 class="h3 mb-2 text-gray-800">Applicant List</h1>
          </div>
          <p><b>List of Student Applied:</b></p>
          <div class="card-body px-0 pt-0 pb-2">
            <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                    <div class="table-responsive">
                        <tr>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Name</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Email</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Contact</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Position Name</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" width="280px">Action</th>
                        </tr>
                        <tbody>
                        @foreach($positions as $position)
                            @foreach($position->students as $student)
                                <tr>
                                    <td class="text-xs font-weight-bold mb-0">{{ $student->pivot->id }}</td>
                                    <td class="align-middle text-center text-sm">{{ $student->name }}</td>
                                    <td class="align-middle text-center text-sm">{{ $student->pivot->email }}</td>
                                    <td class="align-middle text-center">{{ $student->pivot->contact}}</td>
                                    <td class="align-middle text-center">{{ $position->position_name}}</td>
                                    <td class="align-middle text-center">{{ $student->pivot->status }}</td>
                                    <td class="text-secondary font-weight-bold text-xs">
                                            <a class="btn btn-info" href="{{ route('applicants.show',['applicant'=>$student->pivot->id]) }}">Show</a>
                                            <a class="btn btn-primary" href="{{ route('applicants.edit',['applicant'=>$student->pivot->id]) }}">Status</a>
                                    </td>
                                </tr>
                            @endforeach
                        @endforeach
                    </tbody>
                    </div>
                </table>
            </div>
        </div>
    </div>
</div>
</div>
</div>
@endsection

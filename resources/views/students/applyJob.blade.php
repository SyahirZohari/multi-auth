@extends('layouts.stud-template')
@section('content')
<div class="container-fluid py-4">
    <div class="row">
      <div class="col-12">
        <div class="card mb-4">
          <div class="card-header pb-0">
            <h1 class="h3 mb-2 text-gray-800">Job Position List</h1>
          </div>
          <div class="card-body px-0 pt-0 pb-2">
            <div class="table-responsive p-0">
              <table class="table align-items-center mb-0">
            <div class="table-responsive">
                    <tr>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Name</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Department</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Salary</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Company</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Created By</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" width="280px">Action</th>
                    </tr>
                    <tbody>
                    @foreach ($applyPosition as $p)
                    <tr>
                        <td class="text-xs font-weight-bold mb-0">{{ $p->id }}</td>
                        <td class="align-middle text-center text-sm">{{ $p->position_name }}</td>
                        <td class="align-middle text-center">{{ $p->position_department}}</td>
                        <td class="align-middle text-center">{{ $p->position_salary}}</td>
                        <td class="align-middle text-center">{{ $p->company->name}}</td>
                        <td class="align-middle text-center">{{ $p->industry->name }}</td>
                        <td class="text-secondary font-weight-bold text-xs">
                                <a class="btn btn-info" href="{{ route('applys.show',$p->id) }}">Show</a>

                                <a class="btn btn-primary" href="{{ route('applys.create',$p->id) }}" >Apply</a>      
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
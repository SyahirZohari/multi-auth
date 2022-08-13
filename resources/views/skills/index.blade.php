@extends('layouts.stud-template')
@section('content')
<div class="container-fluid py-4">
    <div class="row">
      <div class="col-12">
        <div class="card mb-4">
          <div class="card-header pb-0">
            <h1 class="h3 mb-2 text-gray-800">Student Skills</h1>
          </div>
          <div class="card-body px-0 pt-0 pb-2">
            @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
            <div class="table-responsive p-0">
              <table class="table align-items-center mb-0">
            <div class="table-responsive">
                    <tr>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Name</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Desc</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Resume Belong To</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" width="280px">Action</th>
                    </tr>
                    <tbody>
                    @foreach ($skills as $s)
                    <tr>
                        <td class="align-middle text-center text-sm">{{ $s->id }}</td>
                        <td class="align-middle text-center text-sm">{{ $s->name }}</td>
                        <td class="align-middle text-center text-sm">{{ $s->desc }}</td>
                        <td class="align-middle text-center">{{ $s->resume->name}}</td>
                        <td class="align-middle text-center"></td>
                        <td class="align-middle text-secondary font-weight-bold text-xs">
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
@extends('layouts.in-template')
@section('content')
<div class="container-fluid py-4">
    <div class="row">
      <div class="col-12">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Show Student Resume Details</h2>
            </div>
        </div>
    </div>

   <div class="card">
    <div class="row mt-3">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                {{ $allResume->name }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Image:</strong>
                <img width="180" height="180" src="{{asset('images/'. $allResume->image) }}">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>About Me:</strong>
                {{ $allResume->about_me }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Experience:</strong>
                {{ $allResume->experience }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Education:</strong>
                {{ $allResume->education }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>CPRE Status:</strong>
                {{ $allResume->cpre_status }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>CGPA:</strong>
                {{ $allResume->cgpa }}
            </div>
        </div>


        <div class="table-responsive p-0">
            <table class="table align-items-center mb-0">
          <div class="table-responsive">
                  <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Name</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Desc</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Endorse By</th>
                  </tr>
                  <tbody>
                  @foreach ($skills as $s)
                  <tr>
                      <td class="align-middle text-center text-sm">{{ $s->id }}</td>
                      <td class="align-middle text-center text-sm">{{ $s->name }}</td>
                      <td class="align-middle text-center text-sm">{{ $s->desc }}</td>

                      <td class="align-middle text-center text-sm">
                            <ul>
                                @foreach ($s->lecturers as $lecturer)
                                    <li>{{$lecturer->name}} ( {{$lecturer->endorse($s->id)->endorse_status}} )</li>
                                    @endforeach
                            </ul>
                      </td>

                  </tr>
                  </tbody>
                  @endforeach
              </table>
          </div>


    </div>
   </div>
   <center class="mt-2">
    <a class="btn btn-primary" href="{{ route('allResumes.index') }}"> Back</a>
</center>
    </div>
</div>



@endsection

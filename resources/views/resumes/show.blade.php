@extends('layouts.stud-template')
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
    <div class="row mt-2">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                {{ $resume->name }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Image:</strong>
                <img width="180" height="180" src="{{asset('images/'. $resume->image) }}">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>About Me:</strong>
                {{ $resume->about_me }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Experience:</strong>
                {{ $resume->experience }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Education:</strong>
                {{ $resume->education }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>CPRE Status:</strong>
                {{ $resume->cpre_status }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>CGPA:</strong>
                {{ $resume->cgpa }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Created By:</strong>
                {{ $resume->student->name }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Email:</strong>
                {{ $resume->student->email }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Phone:</strong>
                {{ $resume->student->contact }}
            </div>
        </div>
                    <!-- Button trigger modal -->
            <button type="button" class="col-xs-3 col-sm-3 col-md-3 btn btn-primary" data-bs-toggle="modal" data-bs-target="#addSkillModel{{$resume->id}}">
                Add Skill
            </button>

            <!-- Modal -->
            <div class="modal fade" id="addSkillModel{{$resume->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Skills</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ route('skills.store') }}" method="POST">
                    <div class="modal-body">
                        {{csrf_field()}}
                            <div class="form-group">
                                <strong>Name:</strong>
                                <input type="text" name="name" class="form-control" placeholder="Name" required>
                            </div>

                            <div class="form-group">
                                <strong>Description:</strong>
                                <input type="text" name="desc" class="form-control" placeholder="Description" required>
                            </div>

                            <input type="hidden" name="resume_id" value="{{$resume->id}}">

                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
                </div>
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
   <div class="col-xs-12 col-sm-12 col-md-12">
    <a class="btn btn-primary" href="{{ route('resumes.index') }}"> Back</a>
    </div>
    </div>
</div>
<!-- JavaScript -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>



@endsection

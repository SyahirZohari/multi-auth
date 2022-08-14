@extends('layouts.lect-template')
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
                {{ $studResume->name }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Image:</strong>
                <img width="180" height="180" src="{{asset('images/'. $studResume->image) }}">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>About Me:</strong>
                {{ $studResume->about_me}}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Experience:</strong>
                {{ $studResume->experience }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Education:</strong>
                {{ $studResume->education }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>CPRE Status:</strong>
                {{ $studResume->cpre_status }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>CGPA:</strong>
                {{ $studResume->cgpa }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Created By:</strong>
                {{ $studResume->student->name }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Email:</strong>
                {{ $studResume->student->email }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Phone:</strong>
                {{ $studResume->student->contact }}
            </div>
        </div>
        <div class="table-responsive p-0">
            <table class="table align-items-center mb-0">
          <div class="table-responsive">
                  <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Name</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Desc</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Skill valid</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Action</th>
                  </tr>
                  @foreach ($skills as $skill)
                  <tbody>
                  <tr>
                    <td class="align-middle text-center text-sm">{{ $skill->id }}</td>
                    <td class="align-middle text-center text-sm">{{ $skill->name }}</td>
                    <td class="align-middle text-center text-sm">{{ $skill->desc }}</td>
                    <td class="align-middle text-center text-sm">
                        @if (!in_array($skill->id, $endorsedIds))
                            {{ 'Pending for endorsement' }}
                        @else
                            {{ $endorsedArray[$skill->id] }}
                        @endif
                    </td>
                    <td class="align-middle text-center text-sm">
                        <!-- Button trigger modal -->
                        @if (in_array($skill->id, $endorsedIds))
                        <button type="button" class="btn btn-outline-secondary" disabled>
                            Endorsed
                        </button>
                        @else
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#endorseSkillModel{{$skill->id}}"  href="{{ route('endorse.create',$skill->id) }}">
                            Endorse
                        </button>
                        @endif
                    </td>
                  </tr>
                  </tbody>
                  @endforeach
              </table>
          </div>



          @foreach ($skills as $skill)
          <!-- Modal -->
          <div class="modal fade" id="endorseSkillModel{{$skill->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Endorse Skills</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('endorse.store') }}" method="POST">
                <div class="modal-body">
                    {{csrf_field()}}

                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="endorse_status" id="inlineRadio1" value="Yes">
                        <label class="form-check-label" for="inlineRadio1">Yes</label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="endorse_status" id="inlineRadio2" value="No">
                        <label class="form-check-label" for="inlineRadio2">No</label>
                      </div>

                      <input type="hidden" name="skill_id" value="{{$skill->id}}">



                    </div>

                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
            </div>
            </div>
        </div>
        @endforeach
        <div class="pull-right mt-2 mb-2">
                <a class="btn btn-primary" href="{{ route('studResume.index') }}"> Back</a>
        </div>
    </div>
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

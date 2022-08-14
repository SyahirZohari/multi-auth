@extends('layouts.stud-template')
@section('content')
<div class="container-fluid py-4">
    <div class="row">
      <div class="col-12">
        <div class="card mb-4">
          <div class="card-header pb-0">
            <h1 class="h3 mb-2 text-gray-800">Student Resume</h1>
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
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Image</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">CGPA</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">CPRE Status</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Download CPRE</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" width="280px">Action</th>
                    </tr>
                    <tbody>
                    @foreach ($resume as $r)
                    <tr>
                        <td class="align-middle text-center text-sm">{{ $r->id }}</td>
                        <td class="align-middle text-center text-sm">{{ $r->name }}</td>
                        <td class="align-middle text-center text-sm "><img width="180" height="180" src="{{asset('images/'. $r->image) }}"></td>
                        <td class="align-middle text-center">{{ $r->cgpa }}</td>
                        <td class="align-middle text-center">{{ $r->cpre_status}}</td>

                        <td class="align-middle text-center"><a class="btn btn-primary" href="{{ route('cpre_doc.download', $r->id) }}"  >Download {{$r->id}}</a></td>
                        
                        <td class="align-middle text-secondary font-weight-bold text-xs">
                            <form action="{{ route('resumes.destroy',$r->id) }}" method="POST">
            
                                <a class="btn btn-info" href="{{ route('resumes.show',$r->id) }}">Show</a>
                
                                <a class="btn btn-primary" href="{{ route('resumes.edit',$r->id) }}">Edit</a>
            
                                @csrf
                                @method('DELETE')
                
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
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
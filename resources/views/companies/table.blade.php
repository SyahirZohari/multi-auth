@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>List of Company</h2>
        </div>
        
    </div>
</div>

@if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif

<table class="table table-bordered">
    <tr>
        <th>No</th>
        <th>Company Name</th>
        <th>Address</th>
        <th>Contact</th>
    </tr>
    @foreach ($companies as $c)
    <tr>
        <td>{{ $c->id }}</td>
        <td>{{ $c->name }}</td>
        <td>{{ $c->address }}</td>
        <td>{{ $c->contact }}</td>
    </tr>
    @endforeach
</table>
@endsection
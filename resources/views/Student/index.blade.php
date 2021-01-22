@extends("layout.master")


@section('title',"Student Information|Home")


@section("content")
 <h4 class="float-left text-bold lead=2 text-success">Student Information App</h4>
 <a href="/create" class="float-right btn btn-warning">Create Information</a>
<br><br>
@if($data)
<table class="table table-striped">
<tr>
<th>#</th>
<th>Name</th>
<th>Father Name</th>
<th>Email</th>
<th>Contact</th>
<th>Gender</th>
<th>Status</th>
<th>Skills</th>
<th>Address</th>
<th>Edit</th>
<th>Delete</th>
<th>View</th>

@foreach($data as $student)

<tr>
<td>{{ $student['id'] }}</td>
<td>{{ $student['name'] }}</td>
<td>{{ $student['father_name'] }}</td>
<td>{{ $student['email'] }}</td>
<td>{{ $student['contact'] }}</td>
<td>{{ $student['gender'] }}</td>
<td>{{ $student['current_status'] }}</td>
<td>{{ $student['skills'] }}</td>
<td>{{ $student['address'] }}</td>

<td><a href="/edit/{{ $student['id'] }}" class="btn btn-sm btn-warning">Edit</a></td>
<td><a href="/delete/{{ $student['id'] }}" class="btn btn-sm btn-danger">Delete</a></td>
<td><a href="/view/{{ $student['id'] }}" class="btn btn-sm btn-primary">View</a></td>

</tr>
@endforeach
</table>

@endif



@endsection
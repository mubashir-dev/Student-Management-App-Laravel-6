@extends('layout.master')

@section("title","Student Information|View")


@section('content')

<div class="card text-center">
    <div class="card-header bg-success">
        <h5>Student Information</h5>
    </div>
    <div class="card-body" style="border-bottom:2px solid green">
        <table class="table table-hovered">
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
            </tr>
            <tr>
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
            </tr>

            </tr>

        </table>

        <a href="/" class="btn btn-primary">Go Home</a>
    </div>
</div>


@endsection
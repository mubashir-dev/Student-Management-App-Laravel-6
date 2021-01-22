@extends('layout.master')

@section('title',"Student Information|Edit")


@section('content')

<h2 class="mb-4 float-left">Edit Information</h2>
<a href="/" class="float-right btn btn-warning">Student Information</a>
<br><br><br>

@if (session()->has('message'))
<div class="alert alert-primary" role="alert">
    {{session()->get('message')}}
</div>
@endif

<form action="{{ route('student.edit') }}" method="POST">
    @csrf
    <input type="hidden" name="id" value="{{$data['id']}}">
    <div class="form-group row">
        <label for="name" class="col-4 col-form-label">Name</label>
        <div class="col-8">
            <input id="name" name="name" placeholder="Enter Student Name" value="{{$data['name']}}" type="text" class=" @error('name') is-invalid @enderror form-control">
        </div>
    </div>
    <div class="form-group row">
        <label for="father_name" class="col-4 col-form-label">Father Name</label>
        <div class="col-8">
            <input id="father_name" name="father_name" value="{{$data['father_name']}}" placeholder="Enter Student Father Name" type="text" class=" @error('father_name') is-invalid @enderror form-control">
        </div>
    </div>
    <div class="form-group row">
        <label for="contact" class="col-4 col-form-label">Contact</label>
        <div class="col-8">
            <input id="contact" name="contact" value="{{$data['contact']}}" placeholder="Contact No" type="text" class="  @error('contact') is-invalid @enderror form-control">
        </div>
    </div>
    <div class="form-group row">
        <label for="email" class="col-4 col-form-label">Email</label>
        <div class="col-8">
            <input id="email" name="email" value="{{$data['email']}}" placeholder="Enter Email" type="text" class=" @error('email') is-invalid @enderror form-control">
        </div>
    </div>
    <div class="form-group row">
        <label class="col-4">Gender</label>
        <div class="col-8">
            <div class="custom-control custom-radio custom-control-inline">
                <input name="gender" id="gender_0" type="radio" {{ ($data['gender'] == 'male') ? 'checked' : ''}} class="custom-control-input" value="male">
                <label for="gender_0" class="custom-control-label">Male</label>
            </div>
            <div class="custom-control custom-radio custom-control-inline">
                <input name="gender" id="gender_1" type="radio" {{ ($data['gender'] == 'female') ? 'checked' : ''}} class="custom-control-input" value="Female">
                <label for="gender_1" class="custom-control-label">Female</label>
            </div>
            <div class="custom-control custom-radio custom-control-inline">
                <input name="gender" id="gender_2" type="radio" {{ ($data['gender'] == 'other') ? 'checked' : ''}} class="custom-control-input" value="Other">
                <label for="gender_2" class="custom-control-label">Other</label>
            </div>
            <br><span class="text-danger text-ccccccccccc">{{$errors->first('gender')}}</span>

        </div>

    </div>
    <div class="form-group row">
        <label for="status" class="col-4 col-form-label">Current Status</label>
        <div class="col-8">
            <select id="status" name="status" class="custom-select @error('status') is-invalid @enderror">
                <option value="">Select Status</option>
                <option value="student" {{ $data['current_status'] == 'student'   ? 'selected' :''}}>Student</option>
                <option value="employed" {{ $data['current_status']  == 'employed' ? 'selected':''}}>Employed</option>
            </select>
        </div>
        <!-- <br><span class="text-danger text-ccccccccccc">{{$errors->first('status')}}</span> -->
    </div>
    <div class="form-group row">
        <label class="col-4 col-form-label">Skills</label>
        <div class="col-8">
            <div class="custom-controls-stacked">
                <div class="custom-control custom-checkbox">
                    <input name="skills[]" id="skills_0" {{ in_array('c++', $skills_list) ? ' checked' : '' }} type="checkbox" class="custom-control-input" value="c++">
                    <label for="skills_0" class="custom-control-label">C++</label>
                </div>
            </div>

            <div class="custom-controls-stacked">
                <div class="custom-control custom-checkbox">
                    <input name="skills[]" id="skills_1" {{ in_array('java', $skills_list) ? ' checked' : '' }} type="checkbox" class="custom-control-input" value="java">
                    <label for="skills_1" class="custom-control-label">Java</label>
                </div>
            </div>

            <div class="custom-controls-stacked">
                <div class="custom-control custom-checkbox">
                    <input name="skills[]" id="skills_2" {{ in_array('js', $skills_list) ? ' checked' : '' }} type="checkbox" class="custom-control-input" value="js">
                    <label for="skills_2" class="custom-control-label">Js</label>
                </div>
            </div>
            <div class="custom-controls-stacked">
                <div class="custom-control custom-checkbox">
                    <input name="skills[]" id="skills_3" {{ in_array('web-html-css-bootstrap', $skills_list) ? ' checked' : '' }} type="checkbox" class="custom-control-input" value="web-html-css-bootstrap">
                    <label for="skills_3" class="custom-control-label">HTML,CSS,Bootstrap</label>
                </div>
            </div>

            <div class="custom-controls-stacked">
                <div class="custom-control custom-checkbox">
                    <input name="skills[]" id="skills_4" {{ in_array('others', $skills_list) ? ' checked' : '' }} type="checkbox" class="custom-control-input" value="others">
                    <label for="skills_4" class="custom-control-label">Others</label>
                </div>
            </div>
        </div>
        <br><span class="text-danger">{{$errors->first('skills')}}</span>
    </div>
    <div class="form-group row">
        <label for="address" class="col-4 col-form-label ">Address</label>
        <div class="col-8">
            <textarea id="address" name="address" cols="40" rows="5" class=" @error('address') is-invalid @enderror form-control">
            {{$data['address']}}
            </textarea>
        </div>
    </div>
    <div class="form-group row">
        <div class="offset-4 col-8">
            <input type="submit" value="Edit Information" class="btn btn-primary">
        </div>
    </div>
</form>
@endsection
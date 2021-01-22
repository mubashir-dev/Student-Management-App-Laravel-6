<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Student;

class StudentController extends Controller
{
    public function index()
    {
        $student = new Student;
        $data = $student->all();
        return view('Student.index', ['data' => $data]);
    }

    public function create()
    {
        return view("Student.create");
    }

    public function store(Request $request)
    {

        $rules = [
            'name'     => 'required',
            'father_name' => 'required',
            'email' => 'required|email',
            'contact' => 'required|numeric',
            'gender' => 'required',
            'status' => 'required',
            'skills' => 'required',
            'address' => 'required'
        ];
        $messages = [
            'email.required'   => 'Email is required!',
            'name.required'    => 'Enter Your Name!',
            'gender.required'  => 'Gender is required!',
            'address.required' => 'Address is required!',
            'status.required'  => 'Slect your status!',
            'contact.required' => 'Contact is required!',
            'skills.required'    => 'Atleast Select One Skill'
        ];

        $request->validate($rules, $messages);

        $skills_list = '';
        //Converting Skills Array into Manageable string
        if ($request->get('skills')) {
            $skills_list = implode('|', $request->get('skills'));
        }

        //Model Object 
        $student = new Student;

        //Assigning value to Model
        $student['name'] = $request->get('name');
        $student['father_name'] = $request->get('father_name');
        $student['contact'] = $request->get('contact');
        $student['email'] = $request->get('email');
        $student['gender'] = $request->get('gender');
        $student['current_status'] = $request->get('status');
        $student['skills'] = $skills_list;
        $student['address'] = $request->get('address');

        if ($student->save()) {
            return view("Student.create")->with('message', 'Student data has been Saved !');
        }

        return view("Student.create")->with('message', 'Student data has not been Saved !');
    }

    public function show($id)
    {
        $data = Student::find($id);
        $skills_list = explode('|', $data['skills']);
        return view("Student.edit", ['data' => $data, 'skills_list' => $skills_list]);
    }

    public function edit(Request $request)
    {

        $rules = [
            'name'     => 'required',
            'father_name' => 'required',
            'email' => 'required|email',
            'contact' => 'required|numeric',
            'gender' => 'required',
            'status' => 'required',
            'skills' => 'required',
            'address' => 'required'
        ];
        $messages = [
            'email.required'   => 'Email is required!',
            'name.required'    => 'Enter Your Name!',
            'gender.required'  => 'Gender is required!',
            'address.required' => 'Address is required!',
            'status.required'  => 'Slect your status!',
            'contact.required' => 'Contact is required!',
            'skills.required'    => 'Atleast Select One Skill'
        ];

        $request->validate($rules, $messages);

        $skills_list = '';
        //Converting Skills Array into Manageable string
        if ($request->get('skills')) {
            $skills_list = implode('|', $request->get('skills'));
        }

        //Model Object 
        $student = Student::find($request->get('id'));
        //Assigning value to Model
        $student['name'] = $request->get('name');
        $student['father_name'] = $request->get('father_name');
        $student['contact'] = $request->get('contact');
        $student['email'] = $request->get('email');
        $student['gender'] = $request->get('gender');
        $student['current_status'] = $request->get('status');
        $student['skills'] = $skills_list;
        $student['address'] = $request->get('address');

        if ($student->save()) {
            return redirect('/')->with('message', 'Student data has been Updated !');
        }

        return redirect('/')->with('message', 'Student data has not been Updated !');
    }
    public function delete($id)
    {
        $student = Student::find($id);
        if ($student->delete()) {
            return redirect('/')->with('message', 'Student data has been Deleted !');
        }
        return redirect('/')->with('message', 'Student data has not been Deleted !');
    }

    public function view($id)
    {
        $student = Student::find($id);
        if ($student) {
            return view("Student.view", ['student' => $student]);
        }
        return redirect('/')->with('message', 'No Record found with this Id !');
    }
}

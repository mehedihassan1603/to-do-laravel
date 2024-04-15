<?php

namespace App\Http\Controllers;

use App\Models\Students;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function Student(){
        return view('create_student');
    }

    public function CreateStudent(Request $request){
        $request->validate([
            'name' => 'required|string',
            'father_name' => 'required|string',
            'mother_name' => 'required|string',
            'phone_number' => 'required|unique:students',
            'email' => 'required|unique:students',
            'gpa' => 'required',
        ]);

        Students::insert([
            'name' => $request->name,
            'father_name' => $request->father_name,
            'mother_name' => $request->mother_name,
            'phone_number' => $request->phone_number,
            'email' => $request->email,
            'gpa' => $request->gpa,
        ]);
        Toastr::success('Student Information Added Successfully', 'Successfull!', ["positionClass" => "toast-top-right"]);
        return redirect()->route('index')->with('message','Student Information Added Successfully');
    }

    public function ViewStudent(){
        $students = Students::latest()->get();
        return view('view_student', compact('students'));
    }

    public function EditStudent($id){
        $student_info = Students::findOrFail($id);
        return view('edit_student', compact('student_info'));
    }

    public function UpdateStudent(Request $request){
        $student_id = $request->student_id;

        $request->validate([
            'name' => 'required|string',
            'father_name' => 'required|string',
            'mother_name' => 'required|string',
            'phone_number' => 'required',
            'email' => 'required',
            'gpa' => 'required',
        ]);

        Students::findOrFail($student_id)->update([
            'name' => $request->name,
            'father_name' => $request->father_name,
            'mother_name' => $request->mother_name,
            'phone_number' => $request->phone_number,
            'email' => $request->email,
            'gpa' => $request->gpa,
        ]);
        Toastr::success('Student Information Updated Successfully', 'Successfull!', ["positionClass" => "toast-top-right"]);
        return redirect()->route('index')->with('message','Student Information Updated Successfully');
    }

    public function DeleteStudent($id){
        Students::findOrFail($id)->delete();
        Toastr::info('Student Deleted Successfully', 'Successfull!', ["positionClass"=> "toast-top-right","progressBar"=> true,"closeButton"=> true]);
        return redirect()->route('index')->with('message','Student Deleted Successfully');
    }
}

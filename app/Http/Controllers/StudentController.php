<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class StudentController extends Controller
{
    public function index(){
        $students = Student::all();
        return view('index' , compact('students'));
    }

    public function create(){
        return view('create');
    }

    public function store(Request $request){
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|max:255|unique:students,email',           
            'phone' => 'required',
            'section' => 'required',
            'description' => 'nullable',
            'image' => 'required'
        ]);        
        
        if($request->hasFile('image')){
            $image = $request->file('image');
            $profileImage = date('YmdHis').".".$image->getClientOriginalExtension();
            $destination = 'photos/';
            $image->move($destination, $profileImage);
            $validatedData['image'] = $profileImage;
        }
        Student::create($validatedData);
        return redirect(route('students.index'))->with('success','Student added successfully');
    }

    public function show(Student $student){
        return view('show' , ['student' => $student]);
    }


    public function edit(Student $student){
        return view('edit' , ['student' => $student]);
    }
    public function update(Student $student, Request $request){
         $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => [
                'required',
                'max:255',
                Rule::unique('students')->ignore($student->id),                 
            ],
            'phone' => 'required',
            'section' => 'required',
            'description' => 'nullable',
            'image' => 'nullable'
        ]);    
        if($request->hasFile('image')){
            $oldImagePath = public_path('photos/'.$student->image);
            if(file_exists($oldImagePath)){
                unlink($oldImagePath);
            }
            $image = $request->image;
            $profileImage = date('YmdHis').".".$image->getClientOriginalExtension();
            $destination = 'photos/';
            $image->move($destination, $profileImage);
            $validatedData ['image'] = $profileImage ;
        }
        $student->update($validatedData);
        return redirect(route('students.index'))->with('success', 'student updated successfully');
    }

    public function destroy(Student $student){
        $image = $student->image;
        $path = public_path('photos/'.$image);
        if(file_exists($path)){
             unlink($path);
        }
        $student->delete();
        return redirect(route('students.index'))->with('success','student deleted successfully');
    }
}

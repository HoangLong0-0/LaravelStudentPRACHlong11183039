<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function form(){
        return view('index',[
        ]);
    }

    public function save(Request $request)
    {
        $name = $request->get("name");
        $student = Student::findByName($name);
        $request->validate([
            "name" => "required",
            "email" => "required",
            "phone" => "required",
            "feedback" => "required",
        ], [
            "name.required" => "insert name",
            "email.required" => "insert email",
            "phone.required" => "insert phone",
            "feedback.required" => "insert feedback",

        ]);
        try {
            $student->update([
                "email"=>$request->get("email"),
                "phone"=>$request->get("phone"),
                "feedback"=>$request->get("feedback"),
            ]);
        }catch (\Exception $e){
            abort(404);
        }
        return redirect()->to("index");


    }
}

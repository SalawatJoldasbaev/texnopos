<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function create(Request $request){
        $teacher = Teacher::where('name', $request->name)->first();
        if($teacher){
            return ResponseController::error('This teacher is already signed in!');
        }
        Teacher::create([
            "name" => $request->name,
            "image" => $request->image,
            "description" => $request->description,
        ]);
        return ResponseController::success();
    }
}

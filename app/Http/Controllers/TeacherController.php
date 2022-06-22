<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;
use App\Http\Requests\TeacherRequest;

class TeacherController extends Controller
{
    public function create(TeacherRequest $request){
        $teacher = Teacher::where('name', $request->name)->first();
        if($teacher){
            return ResponseControler::error('The teacher is exists');
        }
        Teacher::create([
            "name" => $request->name,
            "image" => $request->image,
            "description" => $request->description
        ]);
        return ResponseControler::success();
    }
    public function show(){
        $teachers = Teacher::paginate();
        $collection = [
            "last_page" => $teachers->lastPage(),
            "teachers" => [],
        ];
        if(count($teachers) == 0){
            return ResponseController::error('There is no teacher at Texnopos');
        }
        foreach($teachers as $teacher){
            $collection["teachers"][] = [
                "teacher_id" => $teacher->id,
                "name" => $teacher->name,
                "image" => $teacher->image,
                "description" => $teacher->description
            ];
        }
        return  ResponseController::data($collection);
    }
    public function update($id, TeacherRequest $request){
        $teacher = Teacher::find($id);
        if(!$teacher){
            return ResponseController::error('There is no teacher to update!', 404);
        }
        $teacher->update($request->all());
        return ResponseController::success();
    }
    public function delete($id){
        $teacher = Teacher::find($id);
        if(!$teacher){
            return ResponseController::error('There is  no teacher to delete!', 404);
        }
        $teacher->delete();
        return ResponseController::success();
    }
    public function history(){
        $teachers = Teacher::onlyTrashed()->get();
        if(count($teachers) == 0){
            return ResponseController::error('There is no deleted teacher');
        }
        return ResponseController::data($teachers);
    }
    public function restore($id){
        $teacher = Teacher::withTrashed()->find($id);
        if($teacher->trashed()){
            $teacher->restore();
            return ResponseController::success();
        }
        return ResponseController::error('There is no teacher to restore', 404);
    }
}


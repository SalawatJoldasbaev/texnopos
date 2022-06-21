<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function create(Request $request){
        $course = Course::where('name', $request->name)->first();
        if($course){
            return ResponseController::error('This course is already available');
        }
        Course::create([
            "teacher_id" => $request->teacher_id,
            "image" => $request->image,
            "name" => $request->name,
            "lesson_duration" => $request->lesson_duration,
            "number_pupils" => $request->number_pupils,
            "description" => $request->description,
            "who_for" => $request->who_for,
            "advantages" => $request->advantages,
            "module_count" => $request->module_count,
            "lessons_count" => $request->lessons_count,
            "course_duration" => $request->course_duration,
            "topics" => $request->topics
        ]);
        return ResponseController::success();
    }
    public function show(){
        $courses = Course::all();
        if(count($courses) == 0){
            return ResponseController::error('There is no courses to show', 404);
        }
        return ResponseController::data($courses);
    }
    public function update($id, Request $request){
        $course = Course::find($id);
        if(!$course){
            return ResponseController::error('There is no course to update', 404);
        }
        $course->update($request->all());
        return  ResponseController::success();
    }
    public function delete($id){
        $course = Course::find($id);
        if(!$course){
            return ResponseController::error('There is no course to delete', 404);
        }
        $course->delete();
        return ResponseController::success();
    }
    public function history(){
        $courses = Course::onlyTrashed()->get();
        if(count($courses) == 0){
            return ResponseController::error('There is no deleted course', 404);
        }
        return ResponseController::data($courses);
    }
    public function restore($id){
        $course = Course::withTrashed()->find($id);
        if($course->trashed()){
            $course->restore();
            return ResponseController::success();
        }
        return ResponseController::error('There is no deleted course to restore', 404);

    }
}

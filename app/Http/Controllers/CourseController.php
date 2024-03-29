<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use App\Http\Requests\CourseRequest;

class CourseController extends Controller
{
    public function create(CourseRequest $request)
    {
        $course = Course::firstWhere('name', $request->name);
        if ($course) {
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
    public function show()
    {
        $courses = Course::all();
        return ResponseController::data($courses);
    }
    public function course(Course $course)
    {
        return $course;
    }
    public function byName()
    {
        $courses = Course::all(['id', 'name']);
        return ResponseController::data($courses);
    }

    public function update($id, CourseRequest $request)
    {
        $course = Course::find($id);
        if (!$course) {
            return ResponseController::error('There is no course to update', 404);
        }
        $course->update($request->all());
        return  ResponseController::success();
    }
    public function delete(Course $course)
    {
        if (!$course) {
            return ResponseController::error('There is no course to delete', 404);
        }
        $course->delete();
        return ResponseController::success();
    }
    public function history()
    {
        $courses = Course::onlyTrashed()->get();
        if (count($courses) == 0) {
            return ResponseController::error('There is no deleted course', 404);
        }
        return ResponseController::data($courses);
    }
    public function restore($id)
    {
        $course = Course::withTrashed()->find($id);
        if ($course->trashed()) {
            $course->restore();
            return ResponseController::success();
        }
        return ResponseController::error('There is no deleted course to restore', 404);
    }
}

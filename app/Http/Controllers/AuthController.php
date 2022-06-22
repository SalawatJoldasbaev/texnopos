<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function loginEmployee(Request $request){
        $employee = Employee::where('phone', $request->phone)->first();
        if(!$employee or !Hash::check($request->password, $employee->password)){
            return ResponseController::error('Either phone or password is incorrect');
        }
        $token = $employee->createToken('employee')->plainTextToken;
        return ResponseController::data([
            "token" => $token
        ]);
    }
    public function getMe(Request $request){
            return $request->user();
    }
    public function createEmployee(Request $request){
        $validator = Validator::make($request->all(), [
            "name" => 'required|string',
            "phone" => 'required|unique:employees,phone|min:13',
            "password" => 'required|min:5'
        ]);
        if($validator->fails()){
            return ResponseController::error($validator->errors()->first());
        }
        $employee = Employee::where('phone', $request->phone)->first();
        if($employee){
            return ResponseController::error('This employee is already exists', 403);
        }
        Employee::create([
            "name" => $request->name,
            "phone" => $request->phone,
            "password" => Hash::make($request->password)
        ]);
        return ResponseController::success();
    }
    public function showEmployee(){
        $employees = Employee::paginate(10);
        $collection = [
            "last_page" => $employees->lastPage(),
            "employees" => [],
        ];
        foreach($employees as $employee){
            $collection['employees'][] = [
                "name" => $employee->name,
                "phone" => $employee->phone,
                "password" => $employee->password,
            ];
        }
        return ResponseController::data($collection);
    }
    public function deleteEmployee($id){
        $employee = Employee::find($id);
        if(!$employee){
            return  ResponseController::error('There is no Employee!', 404);
        };
        $employee->delete();
        return ResponseController::success();
    }
    public function updateEmployee($id, Request $request){
        $validator = Validator::make($request->all(), [
            "name" => 'required|string',
            "phone" => 'required|integer',
            "password" => 'required|min:5'
        ]);
        if($validator->fails()){
            return ResponseController::error($validator->errors()->first());
        }
        $employee = Employee::find($id);
        if(!$employee){
            return ResponseController::error('There is no Employee  to update!', 404);
        }
        $employee->update([
            "name" => $request->name,
            "phone" => $request->phone,
            "password" => Hash::make($request->password)
        ]);
        return ResponseController::success();
    }
    public function history(){
        $employees  = Employee::onlyTrashed()->get();
        return ResponseController::data($employees);
    }
    public function restore($id){
        $employee = Employee::withTrashed()->find($id);
        if($employee->trashed()){
            $employee->restore();
            return ResponseController::success();
        }
        return ResponseController::error('There is no deleted employee to restore', 404);
    }
}

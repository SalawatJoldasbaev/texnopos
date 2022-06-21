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
        try {
            $this->authorize('create', Employee::class);
        } catch (\Throwable $th) {
            return ResponseController::error('You are not allowed to create an Employee!', 405);
        }
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
}

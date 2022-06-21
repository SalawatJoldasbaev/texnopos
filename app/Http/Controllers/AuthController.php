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

}

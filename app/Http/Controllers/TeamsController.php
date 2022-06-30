<?php

namespace App\Http\Controllers;

use App\Http\Requests\TeamsRequest;
use App\Models\Team;
use Illuminate\Http\Request;

class TeamsController extends Controller
{
    public function create(TeamsRequest $request){
        Team::create([
            'image' =>$request->image,
            'full_name' =>$request->full_name,
            'profession' =>$request->profession,
            'description' =>$request->description,
            'is_ceo'=> $request->is_ceo,
        ]);
        return ResponseController::success('Successfuly created',201);
    }

    public function update(TeamsRequest $request,Team $team){
        $team->update($request->only([
            'image',
            'full_name',
            'profession',
            'description',
            'is_ceo'
        ]));
        return ResponseController::success('Successfuly edited');
    }

    public function delete(Team $team){
        $team->delete();
        return ResponseController::success('Successfuly deleted');
    }

    public function allTeams(){
        $teams = Team::all();
        $final = [];
        foreach ($teams as $team){
            $final[] = [
                'id' =>$team->id,
                'image' =>$team->image,
                'full_name' =>$team->full_name,
                'profession' =>$team->profession,
                'description'=> $team->description,
                'is_ceo'=> $team->is_ceo
            ];
        }
        return ResponseController::data($final);
    }

    public function oneTeam(Team $team){
        return ResponseController::data($team);
    }
}

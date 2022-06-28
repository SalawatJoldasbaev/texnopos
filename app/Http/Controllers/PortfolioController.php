<?php

namespace App\Http\Controllers;

use App\Http\Requests\PortfolioRequest;
use App\Models\Portfolio;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    public function create(PortfolioRequest $request){
        Portfolio::create([
            'name' =>$request->name,
            'url' =>$request->url,
            'type' =>$request->type,
            'description' =>$request->description,
        ]);
        return ResponseController::success('Successfuly created');
    }

    public function update(PortfolioRequest $request ,Portfolio $portfolio){
        $portfolio->update($request->only([
            'name',
            'url',
            'type',
            'description'
        ]));
        return ResponseController::success('Successfuly edited');
    }

    public function delete(Portfolio $portfolio){
        $portfolio->delete();
        return ResponseController::success('Successfuly deleted');
    }

    public function allPortfolios(){
        $portfolio = Portfolio::paginate(10);
        $final = [
            'last_page' => $portfolio->lastPage(),
            'portfolios' => []
        ];
        foreach ($portfolio as $item){
            $final['portfolios'][] = [
                'id' =>$item->id,
                'name' =>$item->name,
                'url' =>$item->url,
                'type' =>$item->type,
            ];
        }
        return ResponseController::data($final);
    }

    public function onePortfolio(Portfolio $portfolio){
        return ResponseController::data($portfolio);
    }
}

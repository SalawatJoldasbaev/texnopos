<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use App\Http\Requests\NewsRequest;

class NewsController extends Controller
{
    public function create(NewsRequest $newsRequest){
        News::create([
            'title' =>$newsRequest->title,
            'image' =>$newsRequest->image,
            'body' =>$newsRequest->body,
            'date' =>$newsRequest->date,
            'type' =>$newsRequest->type,
        ]);
        return ResponseControler::success('Successfuly created',201);
    }

    public function update(NewsRequest $newsRequest,News $news){
        $news->update($newsRequest->only([
            'title',
            'image',
            'body' ,
            'date' ,
            'type'
        ]));
        return ResponseControler::success('Successfuly edited');
    }

    public function getBlogs(){
        
    }
}

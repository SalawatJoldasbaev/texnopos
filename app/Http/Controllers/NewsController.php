<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use App\Http\Requests\NewsRequest;

class NewsController extends Controller
{
    public function create(NewsRequest $newsRequest)
    {
        News::create([
            'title' =>$newsRequest->title,
            'image' =>$newsRequest->image,
            'body' =>$newsRequest->body,
            'date' =>$newsRequest->date,
            'type' =>$newsRequest->type,
        ]);
        return ResponseController::success('Successfuly created', 201);
    }

    public function update(NewsRequest $newsRequest, News $news)
    {
        $news->update($newsRequest->only([
            'title',
            'image',
            'body' ,
            'date' ,
            'type'
        ]));
        return ResponseController::success('Successfuly edited');
    }

    public function getNews($type)
    {
        $blogs = News::where('type', $type)->orderBy('id', 'Desc')->paginate(10);
        if (count($blogs) == 0) {
            return ResponseController::error('Not found', 404);
        }
        $final = [
            'last_page' =>$blogs->lastPage(),
            'blogs' => []
        ];
        foreach ($blogs as $blog) {
            $final['blogs'][] = [
                'id' =>$blog->id,
                'title' =>$blog->title,
                'image' =>$blog->image,
                'body' =>$blog->body,
                'date' =>$blog->date,
                'views' =>$blog->views,
            ];
        }
        return ResponseController::data($final);
    }

    public function delete(News $news)
    {
        $news->delete();
        return ResponseController::success('Successfuly deleted');
    }

    public function oneNews(News $news)
    {
        $news->increment('views');
        return ResponseController::data($news);
    }
}

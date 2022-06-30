<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Employee;
use Illuminate\Http\Request;
use App\Http\Requests\NewsRequest;

class NewsController extends Controller
{
    public function create(NewsRequest $newsRequest)
    {
        News::create([
            'employee_id' =>$newsRequest->user()->id,
            'title' =>$newsRequest->title,
            'image' =>$newsRequest->image,
            'body' =>$newsRequest->body,
            'date' =>$newsRequest->date,
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
        ]));
        return ResponseController::success('Successfuly edited');
    }

    public function getNews()
    {
        $news = News::orderBy('id', 'Desc')->paginate(10);
        if (count($news) == 0) {
            return ResponseController::error('News not yet', 404);
        }
        $final = [
            'last_page' =>$news->lastPage(),
            'news' => []
        ];
        foreach ($news as $blog) {
            $employee = Employee::where('id', $blog->employee_id)->first();
            $final['news'][] = [
                'id' =>$blog->id,
                'created_by' => $employee->name,
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

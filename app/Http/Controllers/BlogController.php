<?php

namespace App\Http\Controllers;

use App\Http\Requests\BlogRequest;
use App\Models\Blog;

class BlogController extends Controller
{
    public function create(BlogRequest $blogRequest)
    {
        Blog::create([
            'title' =>$blogRequest->title,
            'image' =>$blogRequest->image,
            'body' =>$blogRequest->body,
            'date' =>$blogRequest->date,
        ]);
        return ResponseController::success('Successfuly created', 201);
    }

    public function update(BlogRequest $blogRequest, Blog $blog)
    {
        $blog->update($blogRequest->only([
            'title',
            'image',
            'body' ,
            'date' ,
        ]));
        return ResponseController::success('Successfuly edited');
    }

    public function getBlogs()
    {
        $blogs = Blog::orderBy('id', 'Desc')->paginate(10);
        if (count($blogs) == 0) {
            return ResponseController::error('Blogs not yet', 404);
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

    public function delete(Blog $blog)
    {
        $blog->delete();
        return ResponseController::success('Successfuly deleted');
    }

    public function oneBlog(Blog $blog)
    {
        $blog->increment('views');
        return ResponseController::data($blog);
    }
}

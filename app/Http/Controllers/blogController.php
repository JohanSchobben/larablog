<?php

namespace App\Http\Controllers;

use App\Blog;
use App\Http\Requests\EditBlogRequest;
use Illuminate\Http\Request;

class blogController extends Controller
{
    public function addBlog(AddBlogRequest $request)
    {
        $blog = new Blog($request->all());

        $blog->save();

        return response()
            ->json([
                'message' => 'blog aangemaakt',
                'blog' => $blog
            ], 201);
    }

    public function editBlog(Blog $blog, EditBlogRequest $request)
    {
        $blog->content = $request->input('content');
        $blog->slug = $request->input('slug');
        $blog->title = $request->input('title');

        $blog->save();
        return response()
            ->json([
                'message' => "blog is opgeslagen",
                'title' => $blog->title,
                'location' => $request->getHttpHost().'/'.$blog->slug
            ]);

    }

    public function getBlog(Blog $blog)
    {
        response()
            ->json([
                'blog' => $blog
            ]);
    }

    public function getAllBlogs()
    {
        $blogs = Blog::all(['title', 'slug', 'content'])
            ->where('hidden', false);

        foreach ($blogs as $blog) {
            $blog->intro = explode(PHP_EOL, $blog->content);
            $blog->content = "";
        }

        return response()
            ->json([
                'blogs' => $blogs
            ]);

    }

    public function showBlog(Blog $blog, Request $request)
    {
        $blog->readable = $request->readable;

        $blog->save();

        return response([
            'message' => 'blog is nu leesbaar'
        ]);
    }
}

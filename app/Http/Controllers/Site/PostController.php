<?php

namespace App\Http\Controllers\Site;

use App\Post;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Mostra todos os posts
     *
     * @return void
     */
    public function index()
    {
        $posts = Post::withCount('comments')
            ->paginate(5);

        if (request()->query('categories')) {
            $posts->load('categories');
        }
        return view('news.index')->with([
            'posts' => $posts
        ]);
    }

    /**
     * Mostra um post unico
     *
     * @param int $id
     * @return void
     */
    public function show($id)
    {
        $post = Post::findOrFail($id);
        return view('post.single', ['post' => $post]);
    }
}

<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;

class CommentController extends Controller
{
  public function store($postId, Request $request)
  {
    $post = Post::find($postId);

    $post->comments()->create($request->all());

    return back()->with('success', 'Comentario criado com sucesso');
  }
}

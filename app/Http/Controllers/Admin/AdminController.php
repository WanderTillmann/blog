<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Post;
use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use App\Http\Controllers\Controller;


class AdminController extends Controller
{
  public function index()
  {
    $posts = Post::paginate(4);
    return view('admin.posts.index', compact('posts'));
  }

  public function create()
  {
    $categories = Category::get();

    return view('admin.posts.create', compact('categories'));
  }

  public function store(PostRequest $request)
  {
    $posts = Post::create($request->all());

    $posts->categories()->sync($request->categories_ids);

    $posts->details()->create($request->only('status', 'visibility'));


    if ($posts) {
      $request->session()->flash('success', 'Post cadastrado com sucesso');
    } else {
      $request->session()->flash('error', 'Erro ao cadastrar o Post');
    }
    return redirect()->route('posts.index');
  }

  public function show(Post $post)
  {
    return view('admin.posts.show', compact('post'));
  }

  public function edit(Post $post)
  {

    $categories = Category::get();
    return view('admin.posts.edit', compact('post',  'categories'));
  }

  public  function update(PostRequest $request, Post $post)
  {
    $result = $post->update($request->all());
    if ($result) {
      $post->categories()->sync($request->categories_ids);
      $post->details->update($request->only('status', 'visibility'));

      $request->session()->flash('success', 'Post atualizado com sucesso');
    } else {
      $request->session()->flash('error', 'Erro ao atualizar o Post');
    }

    return redirect()->route('posts.index');
  }

  public function destroy(Post $post, Request $request)
  {
    if ($post->delete()) {
      $request->session()->flash('success', 'Sucesso em deletar o Post');
    } else {
      $request->session()->flash('error', 'Erro ao deletar o Post');
    }

    return redirect()->route('posts.index');
  }
}

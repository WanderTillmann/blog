@extends('layout.admin')

@section('title')
Detalhes do Post
@endsection

@section('content')
<div class="row">
  <div class="col-md-12">
    <p>O id do post é : {{ $post->id }}</p>
    <p>O status do post é: {{ $post->details->status }}</p>
    <p>A visibilidade do post é: {{ $post->details->visibility }}</p>
    <p>O titulo do post é: {{ $post->title }}</p>
    <p>O conteudo do Post é: {{ $post->content }}</p>

    <a href="{{ route('posts.index') }}">Volta para a lista de projetos</a>
  </div>
</div>
@endsection
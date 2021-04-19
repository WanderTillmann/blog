@extends('layout.admin')

@section('title')
Editar Post
@endsection

@section('content')
<div class="row">
  <div class="col-md-8 col-md-offset-2">
    <form action="{{ route('posts.update',$post->id) }}" method="post" class="form-horizontal">
      {{ csrf_field() }}
      {{ method_field('PUT') }}
      @include('admin.posts.form')
    </form>
    <a href="{{ route('posts.index') }}">Volta para lista de post</a>
  </div>
</div>
@endsection
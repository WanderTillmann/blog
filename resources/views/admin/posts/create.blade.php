@extends('layout.admin')

@section('title')
Cadastro de Posts
@endsection

@section('content')
<div class="row">
  <div class="col-md-8 col-md-offset-2">
    <form action="{{ route('posts.store') }}" method="post" class="form-horizontal">
      {{ csrf_field() }}
      @include('admin.posts.form')
    </form>
    <a href="{{ route('posts.index') }}">Volta para lista de post</a>
  </div>
</div>
@endsection
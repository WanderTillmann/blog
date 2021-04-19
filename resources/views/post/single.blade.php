@extends('layout.app')

@section('title')
{{ $post->title }}
@endsection

@section('header')
{{ $post->title }}
@parent
@endsection

@section('content')
<article>
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
        {{ $post->content }}
      </div>
    </div>
  </div>
</article>

<div class="container">
  <div class="row">
    <div class="col-lg-8 col-md-8 mx-auto">
      <p>
        @foreach ($post->categories as $category)
        <a href="#">{{ $category->name }}</a>
        @endforeach
      </p>
    </div>
  </div>
</div>

<hr>

<div class="container">
  <form action="{{ route('ratings.store',$post) }}" method="POST">
    {{ csrf_field() }}
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
        <label for="title">Avaliar</label>
        <input type="range" min="0" max="10" class="form-control" name="value" list="marcadores">

        <datalist id="marcadores">
          <option value="0"></option>
          <option value="1"></option>
          <option value="2"></option>
          <option value="3"></option>
          <option value="4"></option>
          <option value="5"></option>
          <option value="6"></option>
          <option value="7"></option>
          <option value="8"></option>
          <option value="9"></option>
          <option value="10"></option>
        </datalist>
      </div>

      <div class="col-lg-8 col-md-10 mx-auto text-right">
        <button type="submit">Enviar</button>
      </div>
    </div>
  </form>
</div>

<div class="container">
  <div class="row">
    <div class="col-lg-8 col-md-10 mx-auto">
      <h3 class="text-center">Comentarios</h3>
      @foreach ($post->comments as $comment)
      <h5>{{ $comment->title }}</h5>
      <p style="font-size:15px; argin-top:5px">
        {{ $comment->content }}
      </p>
      @endforeach
    </div>
  </div>
</div>

<div class="container">
  <form action="{{ route('comments.store',$post) }}" method="POST">
    {{ csrf_field() }}
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
        <label for="title">Comentar</label>
        <input type="text" class="form-control" name="title" placeholder="Assunto"></div>


      <div class="col-lg-8 col-md-10 mx-auto">
        <textarea name="content" id="" cols="30" rows="5" placeholder="Mensagem" class="form-control"></textarea>
      </div>

      <div class="col-lg-8 col-md-10 mx-auto text-right">
        <button type="submit">Enviar</button>
      </div>
    </div>
  </form>
</div>

@endsection
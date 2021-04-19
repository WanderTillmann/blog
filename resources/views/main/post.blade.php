<div class="post-preview">
  <a href="{{ route('posts.public.single',$post) }}">
    <h2 class="post-title">
      {{ $post->title}}
    </h2>
    <h3 class="post-subtitle">
      {{ $post->content }}
    </h3>
  </a>
  <p class="post-meta">Postado por
    <a href="#">TreinaWeb</a>
    em @datebr($post->created_at)
  </p>
  <p class="post-meta">
    Categorias:
    @foreach ($post->categories as $category)
    <a href="#">{{ $category->name }}</a>
    @endforeach
  </p>
</div>
<hr>
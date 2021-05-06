<div class="post-preview">
    <a href="{{ route('posts.public.single', $post) }}">
        <h2 class="post-title">
            {{ $post->title }}
        </h2>
        <h3 class="post-subtitle">
            {{ $post->summary_content }}
        </h3>
    </a>
    <p class="post-meta">Postado por
        <a href="#">TreinaWeb</a>
        em @datebr($post->created_at)
        possui {{ $post->comments_count }} comentários
    </p>
    @if (request()->query('categories'))
        <p class="post-meta">
            Categorias:
            @foreach ($post->categories as $category)
                <a href="#">{{ $category->name }}</a>
            @endforeach
        </p>
    @endif

</div>
<hr>

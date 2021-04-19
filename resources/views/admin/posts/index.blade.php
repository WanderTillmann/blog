@extends('layout.admin')

@section('title')
Pagina do Administrador
@endsection

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-12 col-lg-12 mx-auto">
      <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">Id</th>
            <th scope="col">Titulo</th>
            <th scope="col">Status</th>
            <th scope="col">Visibilidade</th>
            <th scope="col">Ações</th>
          </tr>
        </thead>
        <tbody>
          @forelse ($posts as $post)
          <tr>
            <td class="align-middle">
              {{ $post->id }}
            </td>
            <td class="align-middle" >
              <a href="{{ route('posts.show',$post) }}">{{ $post->title }}</a>
            </td>
            <td class="align-middle">{{ $post->details->status }}</td>
            <td class="align-middle">{{ $post->details->visibility }}</td>
            <td class="align-middle">
              <a class="btn btn-success" href="{{ route('posts.edit',$post->id) }}">Editar</a>
              <form style="display:inline" action="{{ route('posts.destroy',$post->id) }}" method="post">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
                <button type="submit" class="btn btn-danger"
                  onclick="return confirm('Tem certeza que deseja remover o post?')">Deletar</button>
              </form>
            </td>
          </tr>
          @empty
          <tr>
            <td>Nenhum post cadastrado</td>
          </tr>
          @endforelse
        </tbody>
      </table>
      <div class="row">
        <div class="col-md-10">
          {{ $posts->links() }}
        </div>
        <div class="col-md-2">
          <a href="{{ route('posts.create') }}" class="btn btn-default">Criar
            Post</a>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
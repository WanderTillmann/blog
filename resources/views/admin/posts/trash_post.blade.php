@extends('layout.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 mx-auto">
                <table class="table table-stripped">
                    <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Titulo</th>
                            <th scope="col">Ação</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($trasheds_post as $trash_post)
                            <tr>
                                <td>{{ $trash_post->id }}</td>
                                <td>{{ $trash_post->title }}</td>
                                <td>
                                    <form action="{{ route('trashrestore', $trash_post->id) }}" method="post">
                                        @csrf
                                        <button class="btn btn-warning">Restaurar</button>
                                    </form>
                                </td>
                            </tr>
                        @empty

                        @endforelse

                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection

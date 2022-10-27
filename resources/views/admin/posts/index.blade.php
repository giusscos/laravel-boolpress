@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="d-flex pb-3">
            <h3 class="text-capitalize">
                Elenco posts
            </h3>
            <a class="text-capitalize btn btn-primary ml-auto" href="{{ route('admin.posts.create') }}">
                Aggiungi post
            </a>
        </div>
    </div>
    <div class="container-lg">
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th>#</th>
                        <th>Titolo</th>
                        <th>Slug</th>
                        <th>Categoria</th>
                        <th>Tag</th>
                        <th colspan="3">Azioni</th>
                    </tr>
                </thead>
                @foreach ($posts as $post)
                    <tr>
                        <td> {{ $post->id }} </td>
                        <td> {{ $post->title }} </td>
                        <td> {{ $post->slug }} </td>
                        <td> {{ $post->category ? $post->category->name : '-' }} </td>
                        <td> 
                            <ul>
                                @foreach($post->tags as $tag)
                                    <li>
                                        <a href="{{route('admin.tags.show', $tag)}}">
                                            {{ $tag->name }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </td>
                        <td><a href="{{ route('admin.posts.show', $post) }}" class="btn btn-primary">Scopri</a></td>
                        <td><a href="{{ route('admin.posts.edit', $post) }}" class="btn btn-primary">Modifica</a></td>
                        <td>
                            <form action="{{ route('admin.posts.destroy', $post) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">
                                    Elimina
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection

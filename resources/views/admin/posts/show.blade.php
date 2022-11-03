@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-10">
                @if ($post->cover_path)
                    <div class="col-3">
                        <img width="300" src="{{ $post->cover_path }}" alt="{{ $post->slug }}">
                    </div>
                @endif
                <h1>
                    {{ $post->title }}
                </h1>
                <h3>
                    {{ $post->category ? $post->category->name : 'Nessuna categoria' }}
                </h3>
                <div class="col-4 pb-3">
                    <div>
                        Tags:
                        <ul>
                            @foreach ($post->tags as $tag)
                                <li>
                                    {{ $tag->name }}
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <span class="row">
                        Creato il: {{ $post->created_at }}
                    </span>
                    <span class="row">
                        Aggiornato il: {{ $post->updated_at }}
                    </span>
                </div>
            </div>
            <div class="col-2 d-flex flex-column align-items-end">
                <a href="{{ route('admin.posts.index') }}" class="btn btn-secondary mb-2">
                    Torna alla tabella
                </a>
                <a href="{{ route('admin.posts.edit', $post) }}" class="btn btn-primary text-capitalize mb-2">
                    Modifica post
                </a>
                <form action="{{ route('admin.posts.destroy', $post) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger text-capitalize mb-2">
                        Elimina post
                    </button>
                </form>
            </div>
        </div>
        <div class="row">
            <p>
                {{ $post->content }}
            </p>
        </div>
    </div>
@endsection

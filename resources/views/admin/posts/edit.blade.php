@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="d-flex pb-3">
            <h3 class="text-capitalize">
                Modifica post
            </h3>
            <a class="text-capitalize btn btn-danger ml-auto" href="{{ route('admin.posts.show', $post) }}">
                Annulla
            </a>
        </div>
    </div>
    <div class="container">
        <form action={{ route('admin.posts.update', $post) }} method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <div class="form-group">
                <label for="cover">Copertina Post</label>
                    <div class="custom-file">
                      <input type="file" class="custom-file-input @error('cover') is-invalid @endif" name="cover" id="cover">
                      <label class="custom-file-label" for="cover">Choose file</label>
                    </div>
                @error('cover')
                    <div class="alert alert-danger mt-2">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="title">Titolo</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title"
                    value="{{ old('title', $post->title) }}">
                @error('title')
                    <div class="alert alert-danger mt-2">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="category">Categoria</label>
                <select name="category_id" class="custom-select @error('category_id') is-invalid @enderror">
                    <option value="">- Nessuna categoria -</option>
                    @foreach ($categories as $category)
                        <option @if (old('category_id', $post->category_id) == $category->id) selected @endif value="{{ $category->id }}">
                            {{ $category->name }}</option>
                    @endforeach
                </select>
                @error('category_id')
                    <div class="alert alert-danger mt-2">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-check py-2">
                <div>
                    Tags
                </div>
                @foreach ($tags as $tag)
                    <span class="px-4">
                        <input class="form-check-input" type="checkbox" name="tags[]" value="{{ $tag->id }}"
                            id="tag-{{ $tag->id }}" @if( in_array($tag->id ,old('tags', $post->tags->pluck('id')->all()))) checked @endif>
                        <label class="form-check-label" for="tag-{{ $tag->id }}">{{ $tag->name }}</label>
                    </span>
                @endforeach
            </div>
            <div class="form-group">
                <label for="content">Contenuto</label>
                <textarea rows="10" class="form-control @error('content') is-invalid @enderror" id="content" name="content">{{ old('content', $post->content) }}</textarea>
                @error('content')
                    <div class="alert alert-danger mt-2">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Modifica</button>
        </form>
    </div>
@endsection

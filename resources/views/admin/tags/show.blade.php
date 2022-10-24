@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-10">
                <h1>
                    {{ $tag->name }}
                </h1>
            </div>
            <div class="col-2 d-flex flex-column align-items-end">
                <a href="{{ route('admin.posts.index') }}" class="btn btn-secondary mb-2">
                    Torna ai posts
                </a>
            </div>
        </div>
        <div class="row justify-content-center py-4">
            @foreach($tag->posts as $post)
            <div class="card text-white bg-dark my-2 mx-2" style="max-width: 18rem; max-height: 18rem;">
                <div class="card-header">
                    <h5 class="card-title">{{$post->title}}</h5>
                </div>
                <div class="card-body" style="overflow-y: auto;">
                  <p class="card-text">{{$post->content}}</p>
                </div>
              </div>
            @endforeach
        </div>
    </div>
@endsection

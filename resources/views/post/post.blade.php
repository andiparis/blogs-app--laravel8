@extends('layouts.main')

@section('container')
  <div class="container">
    <div class="row justify-content-center mb-5">
      <div class="col-md-8">
        <h2 class="mb-3">{{ $post->title }}</h2>
        <p>
          By <a href="/posts?author={{ $post->author->username }}">{{ $post->author->name }}</a>
          in <a href="/posts?category={{ $post->category->slug }}">{{ $post->category->name }}</a>
        </p>
        @if ($post->image)
          <div style="max-height: 400px; overflow: hidden;">
            <img src="{{ asset('storage/' . $post->image) }}" class="img-fluid">
          </div>
        @else
          <img src="https://source.unsplash.com/1200x400?{{ $post->category->name }}" class="img-fluid">
        @endif
        
        <article class="my-3 fs-5">
          {!! $post->body !!}
        </article>

        <a href="/posts" class="d-block mt-3">Back to posts</a>
      </div>
    </div>
  </div>
@endsection
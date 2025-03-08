@extends('layouts.main')

@section('container')
  <h1 class="text-3xl font-bold mb-8">Post By : {{ $author }}</h1>
  @foreach ($posts as $post)
    <article class="mb-3">
      <div class="group relative">
        <h3 class="mt-3 text-lg/6 font-semibold text-gray-900 hover:text-gray-600">
          <a href="/blog/{{ $post->slug }}">
            {{ $post->title }}
          </a>
          
        </h3>
        <p class="mt-2 line-clamp-3 text-sm/6">{{ $post->excerpt }}</p>
        <h3 class="mt-3 text-lg/6 font-semibold text-gray-900 hover:text-gray-600"> By: 
          <a href="/blog/{{ $post->slug }}">
            {{ $post->user->name }}
          </a>
        </h3>
      </div>
    </article>
  @endforeach

@endsection
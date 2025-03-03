@extends('layouts.main')

@section('container')
  <h1 class="text-3xl font-bold mb-8">Halaman Blog Posts</h1>
  @foreach ($posts as $post)
    <article class="mb-3">
      <div class="group relative">
        <h3 class="mt-3 text-lg/6 font-semibold text-gray-900 group-hover:text-gray-600">
          <a href="/blog/{{ $post->slug }}">
            <span class="absolute inset-0"></span>
            {{ $post->title }}
          </a>
        </h3>
        <p class="mt-2 line-clamp-3 text-sm/6">{{ $post->excerpt }}</p>
      </div>
    </article>
  @endforeach

@endsection
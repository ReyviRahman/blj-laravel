@extends('layouts.main')

@section('container')
  <h1 class="text-3xl font-bold mb-8">{{ $title }}</h1>
  @foreach ($posts as $post)
    <article class="mb-5 border-b-1 border-gray-900">
      <div class="group relative">
        <h3 class="mt-3 text-lg/6 font-semibold text-gray-900 hover:text-gray-600">
          <a href="/blog/{{ $post->slug }}">
            <span class="absolute inset-0"></span>
            {{ $post->title }}
          </a>
        </h3>
        <p>By: <a href="/author/{{ $post->user->username }}" class="relative text-gray-900 hover:text-gray-600 
          after:content-[''] after:absolute after:left-0 after:bottom-0 after:w-0 after:h-[2px] 
          after:bg-gray-600 after:transition-all after:duration-300 hover:after:w-full">{{ $post->user->name }}</a> in <a href="/category/{{ $post->category->slug }}" class="relative text-gray-900 hover:text-gray-600 
          after:content-[''] after:absolute after:left-0 after:bottom-0 after:w-0 after:h-[2px] 
          after:bg-gray-600 after:transition-all after:duration-300 hover:after:w-full">{{ $post->category->name }}</a></p>
        <p class="mt-2 line-clamp-3 text-sm/6">{{ $post->excerpt }}</p>
      </div>
    </article>
  @endforeach

@endsection
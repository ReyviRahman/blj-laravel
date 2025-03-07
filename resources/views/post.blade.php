@extends('layouts.main')

@section('container')
  <article>
    <h3 class="mt-3 text-lg/6 font-semibold text-gray-900 group-hover:text-gray-600">
        {{ $post->title }}
    </h3>
    <p>By:... in <a href="/category/{{ $post->category->slug }}" class="relative text-gray-900 hover:text-gray-600 
      after:content-[''] after:absolute after:left-0 after:bottom-0 after:w-0 after:h-[2px] 
      after:bg-gray-600 after:transition-all after:duration-300 hover:after:w-full">{{ $post->category->name }}</a> </p>
    <p class="mt-2">{{ $post->body }}</p>
  </article>
@endsection
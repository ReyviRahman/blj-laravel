@extends('layouts.main')

@section('container')
<article>
  <h3 class="mt-3 text-3xl font-semibold text-gray-900 group-hover:text-gray-600">
      {{ $post->title }}
  </h3>
  <p class="font-semibold">By: <a href="/blog?user={{ $post->user->username }}" class="relative text-gray-900  hover:text-gray-600 
    after:content-[''] after:absolute after:left-0 after:bottom-0 after:w-0 after:h-[2px] 
    after:bg-gray-600 after:transition-all after:duration-300 hover:after:w-full">{{ $post->user->name }}</a> in <a href="/blog?category={{ $post->category->slug }}" class="relative text-gray-900 hover:text-gray-600 
    after:content-[''] after:absolute after:left-0 after:bottom-0 after:w-0 after:h-[2px] 
    after:bg-gray-600 after:transition-all after:duration-300 hover:after:w-full">{{ $post->category->name }}</a> </p>
  <div class="flex flex-col mt-5 mb-5">
    <img src="https://picsum.photos/500/300?grayscale" alt="..." class="max-h-100 rounded object-fill">
  </div>
  <p class="mt-2">{{ $post->body }}</p>
</article>
@endsection
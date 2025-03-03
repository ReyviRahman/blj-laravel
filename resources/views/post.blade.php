@extends('layouts.main')

@section('container')
  <article>
    <h3 class="mt-3 text-lg/6 font-semibold text-gray-900 group-hover:text-gray-600">
        {{ $post->title }}
    </h3>
    <p class="mt-2">{{ $post->body }}</p>
  </article>
@endsection
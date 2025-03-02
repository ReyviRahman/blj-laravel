@extends('layouts.main')

@section('container')
  @foreach ($posts as $post)
    <article class="mb-3">
      <h2>
        <a href="/blog/{{ $post["slug"] }}">{{ $post["title"] }}</a>
      </h2>
      <h5>By: {{ $post["author"] }}</h5>
      <h2>{{ $post["body"] }}</h2>

    </article>
  @endforeach
@endsection
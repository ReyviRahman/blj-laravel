@extends('layouts.main')

@section('container')
  <h1 class="text-3xl font-bold mb-8">Halaman Category</h1>
    <article class="mb-3">
      <div class="group relative">
        <ul class="list-disc">
        @foreach ($categories as $category)
          <li>
            <h3 class="mt-3 text-lg/6 font-semibold text-gray-900 hover:text-gray-600">
              <a href="/blog?category={{ $category->slug }}">
                {{ $category->name }}
              </a>
            </h3>
          </li>
        @endforeach
        </ul>
      </div>
    </article>

@endsection